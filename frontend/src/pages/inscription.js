import React, { Component } from 'react';
import Footer from '../components/footer';
import './inscription.css';

class Inscription extends Component {
    constructor(props) {
        super(props);
        this.state = {
            nom: "",
            mail: "",
            password: ""
        }
    }

    handleChangeName(e) {
        this.setState({
            nom: e.target.value
        })
    }


    handleRadiosChange(e){
        
    }

    handleChangeMail(e) {
        this.setState({
            mail: e.target.value
        })
    }

    handleChangePassword(e) {
        this.setState({
            password: e.target.value
        })
    }

    handleSubmitInscription(e) {
        e.preventDefault();
        const { nom, mail, password } = this.state;
        const status = document.getElementById('flexRadioDefault288').value;
        /* let etudiant = {
             name: nom,
             lastname: prenom,
             email: mail,
             pwd: password
         }*/

        const requestOptions = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ nom: nom, email: mail, password: password,status:status })
        };

        fetch('http://127.0.0.1:8000/api/signup', requestOptions)
            .then(async response => {
                const data = await response.json();

                // check for error response
                if (!response.ok) {
                    // get error message from body or default to response status
                    const error = (data && data.message) || response.status;
                    return Promise.reject(error);
                }
                this.props.history.push("/cours");
            })
            .catch(error => {
                this.setState({ errorMessage: error.toString() });
                console.error('There was an error!', error);
            });

    }

    render() {
        return (
            <div>
                <div className="container">
                    <div className="row">
                        <form onSubmit={(e) => this.handleSubmitInscription(e)}>
                            <div className="card">
                                <div className="card-header text-center">
                                    <h3>Inscription</h3>
                                </div>
                                <div className="card-body">
                                    <div className="form-group">
                                        <label htmlFor="nom" ><strong>Nom:</strong></label>
                                        <input type="text" className="form-control" id="nom" onChange={(e) => this.handleChangeName(e)} />
                                    </div>
                                    <div className="form-group">
                                        <label htmlFor="email"><strong>Email address:</strong></label>
                                        <input type="email" className="form-control" id="email" onChange={(e) => this.handleChangeMail(e)} />
                                    </div>
                                    <div className="form-group">
                                        <label htmlFor="pwd"><strong>Password:</strong></label>
                                        <input type="password" className="form-control" id="pwd" onChange={(e) => this.handleChangePassword(e)} />
                                    </div>
                                    <div className="form-check">
                                        <input className="form-check-input" type="radio" name="flexRadioDefault288" id="flexRadioDefault288" value="student" checked onChange={(e) => this.handleRadiosChange(e)} />
                                            <label className="form-check-label" htmlFor="flexRadioDefault288">
                                                student
                                            </label>
                                    </div>
                                    <button type="submit" className="btn btn-secondary">Enregistrer</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    </div>
                    <Footer />
                </div>
        );
    }
}

export default Inscription;