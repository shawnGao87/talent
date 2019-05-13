import { Table } from "react-bootstrap";

import React from "react";

export default function UserLanguageSkill(props) {
    return (
        <Table striped bordered hover>
            <thead>
                <tr>
                    <th>
                        <a
                            href="userLanguageSkills/create/"
                            className="btn btn-success"
                        >
                            Add New Language
                        </a>
                    </th>
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
                            <td>{l.id}</td>
                            <td>{l.language}</td>
                            <td>{l.speaking}</td>
                            <td>{l.reading}</td>
                            <td>{l.writing}</td>
                            <td>
                                <a
                                    href={
                                        "userLanguageSkills/" + l.id + "/edit"
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
    );
}
