import React, { Fragment } from "react";
import { Table } from "react-bootstrap";

export default function UserCountryLived(props) {
    return (
        <Fragment>
            <div className="container">
                <div className="row justify-content-center p-3">
                    <a
                        href="userCountryLived/create/"
                        className="btn btn-success"
                    >
                        Add New Country
                    </a>
                </div>
            </div>
            <Table striped bordered hover>
                <thead>
                    <tr>
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
                                <td>{country.country_id}</td>
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
        </Fragment>
    );
}
