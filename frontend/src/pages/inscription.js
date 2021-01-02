import React, { Component } from 'react';
import Footer from '../components/footer';
import './inscription.css';

class Inscription extends Component {
    constructor(props) {
        super(props);
        this.state = {
            nom: "",
            prenom: "",
            mail: "",
            password: ""
        }
    }

    handleChangeName(e) {
        this.setState({
            nom: e.target.value
        })
    }

    handleChangePrenom(e) {
        this.setState({
            prenom: e.target.value
        })
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

    handleSubmit(e) {
        e.preventDefault();
        const { nom, prenom, mail, password } = this.state;
        let etudiant = {
            name: nom,
            lastname: prenom,
            email: mail,
            pwd: password
        }

        const requestOptions = {
            mode: 'no-cors',
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(etudiant)
        };

        fetch(`http://127.0.0.1:8000/api/student`, requestOptions).then(Response => {
            console.log(Response);
        }).catch(erreur => {
            console.log(erreur);
        })

    }

    render() {
        return (
            <div>
                <div className="container">
                    <div className="row">
                        <form onSubmit={(e) => this.handleSubmit(e)}>
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
                                        <label htmlFor="prenom" ><strong>Prenom:</strong></label>
                                        <input type="text" className="form-control" id="prenom" onChange={(e) => this.handleChangePrenom(e)} />
                                    </div>
                                    <div className="form-group">
                                        <label htmlFor="email"><strong>Email address:</strong></label>
                                        <input type="email" className="form-control" id="email" onChange={(e) => this.handleChangeMail(e)} />
                                    </div>
                                    <div className="form-group">
                                        <label htmlFor="pwd"><strong>Password:</strong></label>
                                        <input type="password" className="form-control" id="pwd" onChange={(e) => this.handleChangePassword(e)} />
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