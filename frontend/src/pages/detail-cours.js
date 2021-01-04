import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import Footer from '../components/footer';

class DetailCours extends Component {
    constructor(props) {
        super(props)

        this.state = {
            id: this.props.match.params.id,
            table: []
        }
    }

    componentDidMount() {
        fetch(`http://localhost:3001/cours/${this.state.id}`)
            .then(async response => {
                const data = await response.json();

                // check for error response
                if (!response.ok) {
                    // get error message from body or default to response statusText
                    const error = (data && data.message) || response.statusText;
                    return Promise.reject(error);
                }
                console.log(data)

                this.setState({ table: data })
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
                        <div className="col">
                            <div className="alert alert-secondary alert-dismissible fade show mt-3" role="alert">
                                <h4 className="alert-heading">Prérequis</h4>
                                <p>Bases en CSS. Si vous ne les maîtrisez pas, suivez ce cours : <strong>Apprenez à créer votre site web avec HTML5 et CSS3</strong> !</p>
                                <button type="button" className="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <h1 className="my-3">{this.state.table.titre}</h1>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col">
                            <video width={1000} height={500} controls>
                                <source src={this.state.table} type="video/mp4" />
                            </video>
                        </div>
                    </div>
                    <Link to={'/qcm'} className="btn btn-primary  mt-3 "><h4>Passez le QCM</h4></Link>
                </div>
                <Footer />
            </div>
        );
    }
}

export default DetailCours;