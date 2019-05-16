import { Table } from "react-bootstrap";

import React, { Fragment } from "react";

export default function UserLanguageSkill(props) {
    return (
        <Fragment>
            <div className="container">
                <div className="row justify-content-center p-3">
                    <a
                        href="userLanguageSkills/create/"
                        className="btn btn-success"
                    >
                        Add New Language
                    </a>
                </div>
            </div>
            <Table striped bordered hover>
                <thead>
                    <tr>
                        <th>Language</th>
                        <th>Speaking</th>
                        <th>Reading</th>
                        <th>Writing</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    {props.userSkills.language_skills.map(l => {
                        return (
                            <tr key={l.id}>
                                <td>{l.language}</td>
                                <td>{l.speaking}</td>
                                <td>{l.reading}</td>
                                <td>{l.writing}</td>
                                <td>
                                    <a
                                        href={
                                            "userLanguageSkills/" +
                                            l.id +
                                            "/edit"
                                        }
                                        className="btn btn-primary"
                                    >
                                        Edit / Detele
                                    </a>
                                </td>
                            </tr>
                        );
                    })}
                </tbody>
            </Table>
        </Fragment>
    );
}
