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
                country_id: "Country Lived",
                residency_length: "Country Lived Residency Length",
                residency_recency: "Country Lived Residency Recency"
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
            residencyLengthOptions,
            residencyRecencyOptions,
            numOfConditions
        } = this.props.prop;

        const removeFilter = e => {
            console.log(e.target.attributes["data-condition"].value);
            const eleId = e.target.attributes["data-condition"].value;
            document
                .getElementById("adminFilter")
                .removeChild(document.getElementById(eleId));
        };

        const renderOptions = e => {
            const key = e.target.value;
            console.log(key);
            switch (key) {
                case "language":
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
                case "residency_length":
                    const lengthEle = document.getElementById(
                        `condition${numOfConditions}_options`
                    );
                    while (lengthEle.firstChild) {
                        lengthEle.removeChild(lengthEle.firstChild);
                    }
                    for (const key in residencyLengthOptions) {
                        if (residencyLengthOptions.hasOwnProperty(key)) {
                            const o = document.createElement("option");
                            o.value = key;
                            o.innerHTML = residencyLengthOptions[key];
                            lengthEle.appendChild(o);
                        }
                    }
                    break;
                case "residency_recency":
                    const recencyEle = document.getElementById(
                        `condition${numOfConditions}_options`
                    );
                    while (recencyEle.firstChild) {
                        recencyEle.removeChild(recencyEle.firstChild);
                    }
                    for (const key in residencyRecencyOptions) {
                        if (residencyRecencyOptions.hasOwnProperty(key)) {
                            const o = document.createElement("option");
                            o.value = key;
                            o.innerHTML = residencyRecencyOptions[key];
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
                        {/* <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="12"
                            height="12"
                            viewBox="0 0 12 12"
                            className="icon m-3"
                            style={{ shapeRendering: "geometricprecision" }}
                            onClick={removeFilter}
                            data={`condition_${numOfConditions}`}
                        >
                            <path
                                fillRule="evenodd"
                                fill="currentColor"
                                d="M7.41421356,6 L9.88226406,3.5319495 C10.0816659,3.33254771 10.0828664,3.01179862 9.88577489,2.81470708 L9.18529292,2.11422511 C8.97977275,1.90870494 8.66708101,1.91870543 8.4680505,2.11773594 L6,4.58578644 L3.5319495,2.11773594 C3.33254771,1.91833414 3.01179862,1.91713357 2.81470708,2.11422511 L2.11422511,2.81470708 C1.90870494,3.02022725 1.91870543,3.33291899 2.11773594,3.5319495 L4.58578644,6 L2.11773594,8.4680505 C1.91833414,8.66745229 1.91713357,8.98820138 2.11422511,9.18529292 L2.81470708,9.88577489 C3.02022725,10.0912951 3.33291899,10.0812946 3.5319495,9.88226406 L6,7.41421356 L8.4680505,9.88226406 C8.66745229,10.0816659 8.98820138,10.0828664 9.18529292,9.88577489 L9.88577489,9.18529292 C10.0912951,8.97977275 10.0812946,8.66708101 9.88226406,8.4680505 L7.41421356,6 L7.41421356,6 Z"
                            />
                        </svg> */}
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
