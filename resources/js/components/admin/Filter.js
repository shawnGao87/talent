import React, { Component, Fragment } from "react";
import Axios from "axios";
import ReactDOM from "react-dom";
import Condition from "./Condition";

export default class Filter extends Component {
    componentWillMount() {
        Axios.get("./allLanguages")
            .then(res => {
                console.log(res.data);
                this.setState({ languages: res.data });
            })
            .catch(e => console.log(e));
        Axios.get("./allCountries")
            .then(res => {
                console.log(res.data);
                this.setState({ countries: res.data });
            })
            .catch(e => console.log(e));
    }

    constructor() {
        super();
        this.state = {
            languages: [],
            countries: [],
            proficiencyOptions: {
                1: "Novice",
                2: "Intermediate",
                3: "Advanced",
                4: "Native"
            },
            residencyLengthOptions: {
                1: "1-3 months",
                2: "4-6 months",
                3: "7-11 months",
                4: "1-3 years",
                5: "More than 3 years"
            },
            residencyRecencyOptions: {
                1: "Within the last year",
                2: "1-3 years ago",
                3: "3-10 years ago",
                4: "More than 10 years ago"
            },
            numOfConditions: 0
        };
    }
    render() {
        const addFilter = () => {
            console.log(this.state);
            this.setState(
                { numOfConditions: this.state.numOfConditions + 1 },
                () => {
                    const d = document.createElement("div");
                    const id = "condition_" + this.state.numOfConditions;
                    d.id = id;
                    d.className = "row my-3";
                    document.getElementById("adminFilter").appendChild(d);
                    ReactDOM.render(
                        <Condition prop={this.state} />,
                        document.getElementById(id)
                    );
                }
            );
        };

        return (
            <Fragment>
                <button className="btn btn-success" onClick={addFilter}>
                    Add Filter
                </button>
            </Fragment>
        );
    }
}

if (document.getElementById("adminFilter")) {
    const ele = document.getElementById("adminFilter");
    ReactDOM.render(<Filter />, ele);
}
