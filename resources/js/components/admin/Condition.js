import React, { Component, Fragment } from "react";

export default class Condition extends Component {
    constructor() {
        super();
        this.state = {
            conditionOptions: {
                language_id: "Language",
                speaking: "Language Speaking Proficiency",
                reading: "Language Reading Proficiency",
                writing: "Language Writing Proficiency",
                country_id: "Country Experienced",
                residency_length: "Country Lived Residency Length",
                experience_recency: "Country Experience Recency"
            },
            conditionSelected: "",
            conditionOptionSelected: ""
        };
    }
    render() {
        const {
            languages,
            countries,
            proficiencyOptions,
            // residencyLengthOptions,
            experienceRecencyOptions,
            numOfConditions
        } = this.props.prop;

        const removeFilter = e => {
            const eleId = e.target.attributes["data-condition"].value;
            document
                .getElementById("adminFilter")
                .removeChild(document.getElementById(eleId));
        };

        const renderOptions = e => {
            const key = e.target.value;
            switch (key) {
                case "language_id":
                    const optionEle = document.getElementById(
                        `condition${numOfConditions}_options`
                    );
                    while (optionEle.firstChild) {
                        optionEle.removeChild(optionEle.firstChild);
                    }

                    languages.forEach(lan => {
                        const o = document.createElement("option");
                        o.value = lan.id;
                        o.innerHTML = lan.language;
                        optionEle.appendChild(o);
                    });

                    break;
                case "country_id":
                    const countryEle = document.getElementById(
                        `condition${numOfConditions}_options`
                    );

                    while (countryEle.firstChild) {
                        countryEle.removeChild(countryEle.firstChild);
                    }

                    countries.forEach(country => {
                        const o = document.createElement("option");
                        o.value = country.id;
                        o.innerHTML = country.country;
                        countryEle.appendChild(o);
                    });
                    break;
                // render condition options for multi select
                // three case fall through
                case "speaking":
                case "reading":
                case "writing":
                    const proficiencyEle = document.getElementById(
                        `condition${numOfConditions}_options`
                    );
                    while (proficiencyEle.firstChild) {
                        proficiencyEle.removeChild(proficiencyEle.firstChild);
                    }

                    for (const key in proficiencyOptions) {
                        if (proficiencyOptions.hasOwnProperty(key)) {
                            const o = document.createElement("option");
                            o.value = key;
                            o.innerHTML = proficiencyOptions[key];
                            proficiencyEle.appendChild(o);
                        }
                    }
                    break;
                // case "residency_length":
                //     const lengthEle = document.getElementById(
                //         `condition${numOfConditions}_options`
                //     );
                //     while (lengthEle.firstChild) {
                //         lengthEle.removeChild(lengthEle.firstChild);
                //     }
                //     for (const key in residencyLengthOptions) {
                //         if (residencyLengthOptions.hasOwnProperty(key)) {
                //             const o = document.createElement("option");
                //             o.value = key;
                //             o.innerHTML = residencyLengthOptions[key];
                //             lengthEle.appendChild(o);
                //         }
                //     }
                //     break;
                case "experience_recency":
                    const recencyEle = document.getElementById(
                        `condition${numOfConditions}_options`
                    );
                    while (recencyEle.firstChild) {
                        recencyEle.removeChild(recencyEle.firstChild);
                    }
                    for (const key in experienceRecencyOptions) {
                        if (experienceRecencyOptions.hasOwnProperty(key)) {
                            const o = document.createElement("option");
                            o.value = key;
                            o.innerHTML = experienceRecencyOptions[key];
                            recencyEle.appendChild(o);
                        }
                    }

                    break;
                default:
                    break;
            }
        };
        return (
            <Fragment>
                <div className="d-flex justify-content-center align-items-center col-md-5 col-sm-12">
                    <div className="flex item-center">
                        <button
                            type="button"
                            className="close"
                            onClick={removeFilter}
                        >
                            <span
                                aria-hidden="true"
                                data-condition={`condition_${numOfConditions}`}
                            >
                                &times;
                            </span>
                        </button>
                    </div>
                    <div className="flex item-center col-xs-12 col-sm-3">
                        {numOfConditions == 1 ? (
                            "Where"
                        ) : (
                            <select
                                name={`andOr[${numOfConditions}]`}
                                className="form-control"
                            >
                                <option value="and">And</option>
                                <option value="or">Or</option>
                            </select>
                        )}
                    </div>

                    {/* condition options will change onChange */}
                    <select
                        id={`condition${numOfConditions}`}
                        className="form-control col-xs-12 col-sm-9"
                        name={`condition[${numOfConditions}]`}
                        defaultValue="Language"
                        onChange={renderOptions}
                    >
                        <option disabled>Select Filter</option>

                        {Object.keys(this.state.conditionOptions).map(key => {
                            return (
                                <option key={key} value={key}>
                                    {this.state.conditionOptions[key]}
                                </option>
                            );
                        })}
                    </select>
                </div>

                <div className="d-flex justify-content-center align-items-center col-md-7 col-sm-12">
                    <div className="flex item-center col-xs-12 col-sm-3">
                        Is Any Of
                    </div>
                    <div className="flex item-center col-xs-12 col-sm-9">
                        <select
                            id={`condition${numOfConditions}_options`}
                            name={`condition_options[${numOfConditions}][]`}
                            className="form-control"
                            multiple
                            size={3}
                        >
                            {/* default condition options */}
                            {languages.map(lan => {
                                return (
                                    <option value={lan.id} key={lan.id}>
                                        {lan.language}
                                    </option>
                                );
                            })}
                        </select>
                    </div>
                </div>
            </Fragment>
        );
    }
}
