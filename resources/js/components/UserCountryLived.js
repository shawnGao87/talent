import React from "react";
import { Table } from "react-bootstrap";

export default function UserCountryLived(props) {
    return (
        <Table striped bordered hover>
            <thead>
                <tr>
                    <th>
                        <a
                            href="userCountryLived/create/"
                            className="btn btn-success"
                        >
                            Add New Country
                        </a>
                    </th>
                    <th>Country</th>
                    <th>Residence Length</th>
                    <th>Residence Recency</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                {props.userSkills.user_country_lived.map(country => {
                    return (
                        <tr key={country.id}>
                            <td>{country.id}</td>
                            <td>{country.country}</td>
                            <td>{country.residency_length}</td>
                            <td>{country.residency_recency}</td>
                            <td>
                                <a
                                    href={
                                        "userCountryLived/" +
                                        country.id +
                                        "/edit"
                                    }
                                    className="btn btn-primary"
                                >
                                    Edit / Delete
                                </a>
                            </td>
                        </tr>
                    );
                })}
            </tbody>
        </Table>
    );
}
