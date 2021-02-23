import React, { Component } from 'react';
import Footer from '../components/footer';
import './inscription.css';

class Login extends Component {
    constructor(props) {
        super(props);
        this.state = {
            mail: "",
            password: "",
            table:[]
        }
    }

    /*componentDidMount(){
        fetch('http://127.0.0.1:8000/api/login')
        .then(response=>response.json())
        .then((resultat)=>{
            this.setState({
                table:resultat
            })
        })
    }*/

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

        const requestOptions = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({email:mail,password:password})
        };

        fetch('http://127.0.0.1:8000/api/login', requestOptions)
            .then(async response => {
                const data = await response.json();
                console.log(response);
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
                        <form onSubmit={(e) => this.handleSubmit(e)}>
                            <div className="card">
                                <div className="card-header text-center">
                                    <h3>Connexion</h3>
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