import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

import { Form, Card } from "react-bootstrap";
export default class LanguageCreate extends Component {
    componentWillMount() {
        axios
            .get("/talent/languages")
            .then(res => this.setState({ languages: res.data }));
    }

    constructor() {
        super();
        this.state = {
            languages: [],
            languageProficiencies: [
                "Novice",
                "Intermediate",
                "Advanced",
                "Native"
            ],
            languageSkills: ["Speaking", "Reading", "Writing"]
        };
    }
    render() {
        return (
            <Card className="mt-5">
                <Card.Header>Add New Language Skill</Card.Header>
                <Card.Body>
                    <Form>
                        <Form.Group controlId="languages" className="row">
                            <Form.Label className="col-sm-2">
                                Languages
                            </Form.Label>
                            <Form.Control as="select" className="col-sm-8">
                                {this.state.languageList.map(l => {
                                    return (
                                        <option key={l} value={l}>
                                            {l}
                                        </option>
                                    );
                                })}
                            </Form.Control>
                        </Form.Group>

                        {/* {this.state.languageSkills.map(s => {
                            return (
                                <Form.Group
                                    key={s}
                                    controlId={s}
                                    className="row"
                                >
                                    <Form.Label className="col-sm-2">
                                        {s} Proficiency
                                    </Form.Label>
                                    <Form.Control
                                        as="select"
                                        className="col-sm-8"
                                    >
                                        {this.state.languageProficiencies.map(
                                            p => {
                                                return (
                                                    <option key={p} value={p}>
                                                        {p}
                                                    </option>
                                                );
                                            }
                                        )}
                                    </Form.Control>
                                </Form.Group>
                            );
                        })} */}
                        <a href="#" className="btn btn-success mx-3">
                            Submit
                        </a>
                        <a href="#" className="btn btn-danger mx-3">
                            Cancel
                        </a>
                    </Form>
                </Card.Body>
            </Card>
        );
    }
}

if (document.getElementById("languageCreate")) {
    const ele = document.getElementById("languageCreate");
    ReactDOM.render(<LanguageCreate />, ele);
}
