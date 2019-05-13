import "@fortawesome/fontawesome-free/css/all.min.css";
// import "bootstrap-css-only/css/bootstrap.min.css";
// import "mdbreact/dist/css/mdb.css";

import React, { Component } from "react";
import ReactDOM from "react-dom";
import { MDBDataTable, MDBBtn } from "mdbreact";
import axios from "axios";

export default class UserDataGrid extends Component {
    componentWillMount() {
        axios
            .get("users")
            .then(res => {
                console.log(res.data);
                const users = res.data.map(user => {
                    return {
                        id: user.id,
                        firstname: user.firstname,
                        lastname: user.lastname,
                        known_language: user.known_language,
                        lived_countries: user.lived_countries,
                        edit: (
                            <a
                                className="btn btn-primary"
                                href={"user/" + user.id}
                            >
                                Detail
                            </a>
                        )
                    };
                });
                console.log(users);
                this.setState({
                    data: { columns: this.state.columns, rows: users }
                });
            })
            .catch(e => console.log(e));
    }

    constructor() {
        super();
        this.state = {
            columns: [
                {
                    label: "ID",
                    field: "id",
                    sort: "asc"
                },
                {
                    label: "First Name",
                    field: "firstname"
                },
                {
                    label: "Last Name",
                    field: "lastname"
                },
                {
                    label: "Language Known",
                    field: "known_language"
                },
                {
                    label: "Country Lived",
                    field: "lived_countries"
                },
                {
                    label: "Detail",
                    field: "edit"
                }
            ]
        };
    }

    render() {
        return <MDBDataTable striped bordered hover data={this.state.data} />;
    }
}

if (document.getElementById("adminDataGrid")) {
    const ele = document.getElementById("adminDataGrid");
    ReactDOM.render(<UserDataGrid />, ele);
}
