import React, { Component } from 'react';
import Footer from '../components/footer';
import './inscription.css';

class Login extends Component {
    constructor(props) {
        super(props);
        this.state = {
            mail: "",
            password: ""
        }
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
        const { mail, password } = this.state;
        let etudiant = {

            email: mail,
            pwd: password
        }

        const requestOptions = {
            mode: 'no-cors',
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(etudiant)
        };

        fetch(`http://127.0.0.1:8000/api/auth/login`,requestOptions).then(Response=>{
             console.log(Response);
         }).catch(erreur=>{
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

export default Login;