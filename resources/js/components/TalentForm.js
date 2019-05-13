import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import { Tabs, Tab, Card } from "react-bootstrap";
import UserLanguageSkill from "./UserLanguageSkill";
import UserCountryLived from "./UserCountryLived";
export default class TalentForm extends Component {
    constructor(props) {
        super();
        this.state = {
            userSkills: {
                language_skills: [],
                user_country_lived: []
            },
            firstname: "",
            lastname: "",
            email: "",
            id: ""
        };
    }

    componentWillMount() {
        axios
            .get("currentUser")
            .then(res => {
                const { firstname, lastname, email, id } = res.data;
                this.setState(
                    {
                        userId: id,
                        firstname: firstname,
                        lastname: lastname,
                        email: email
                    },
                    () => {
                        axios
                            .get("UserSkills/" + this.state.userId)
                            .then(res =>
                                this.setState({ userSkills: res.data })
                            )
                            .catch(e => console.log(e));
                    }
                );
            })
            .catch(err => err && console.log(err));
    }
    render() {
        return (
            <div className="container mt-5">
                <Card className="mb-5">
                    <Card.Header>Basic Info</Card.Header>
                    <Card.Body>
                        <Card.Text>
                            FirstName: {this.state.firstname} <br />
                            LastName: {this.state.lastname}
                        </Card.Text>
                    </Card.Body>
                </Card>

                <Tabs defaultActiveKey="language" id="uncontrolled-tab-example">
                    <Tab eventKey="language" title="Language Skill">
                        <UserLanguageSkill userSkills={this.state.userSkills} />
                    </Tab>
                    <Tab eventKey="country_lived" title="Country Lived in">
                        <UserCountryLived userSkills={this.state.userSkills} />
                    </Tab>
                </Tabs>
            </div>
        );
    }
}

if (document.getElementById("talentForm")) {
    const ele = document.getElementById("talentForm");
    ReactDOM.render(<TalentForm />, ele);
}
