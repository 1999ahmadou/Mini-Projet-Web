import React, { Component } from 'react';
import Footer from '../components/footer';

class Qcm extends Component {

    constructor(props) {
        super(props)

        this.state = {
            id: this.props.match.params.id,
            tableQuestion: [],
            titre: "",
            reponse: [],
        }
    }

    componentDidMount() {
        fetch(`http://localhost:3001/qcm/${this.state.id}`)
            .then(async response => {
                const data = await response.json();

                // check for error response
                if (!response.ok) {
                    // get error message from body or default to response statusText
                    const error = (data && data.message) || response.statusText;
                    return Promise.reject(error);
                }
                //console.log(data)
                this.setState({ tableQuestion: data.questions, titre: data.titre })
            })
            .catch(error => {
                this.setState({ errorMessage: error.toString() });
                console.error('There was an error!', error);
            });
            
    }

    handleRadiosChange(e) {
        
    }

    handleSubmit(e){
        e.preventDefault();
        var form=e.target.value;
        console.log(form);
        var liste=[];
        liste= this.state.tableQuestion.map((tab,index)=>
            tab.proposition.map(question=>
                {
                    var radio=document.getElementsByName('exampleRadios'+index)
                   // console.log(radio)
                    var mvaleur=[];
                    for (let i = 0; i < radio.length; i++) {
                        if(radio[i].checked){
                            mvaleur.push(radio[i].value);
                            //console.log(mvaleur);
                        }
                        
                    }
                   // console.log(mvaleur)
                    return mvaleur;
                }
                )
            )
            //console.log(liste[0])
            for (let index = 0; index < liste.length; index++) {
                this.setState({reponse:this.state.reponse.push(liste[index][0][0])})
            }
            console.log(this.state.reponse);
    }

    render() {
        return (
            <div>
                <div className="container">
                    <div className="row">
                        <div className="col">
                            <form onSubmit={(e) => this.handleSubmit(e)}>
                                <fieldset>
                                    <h1>{this.state.titre}</h1>
                                    <br />
                                    {
                                        this.state.tableQuestion.map((tab, index) =>
                                            <div key={index}>
                                                <h3><strong>Question {index + 1} </strong></h3>
                                                <hr />
                                                <h4>{tab.contenu}</h4>
                                                {
                                                    tab.proposition.map((question) =>
                                                        <div key={question.id} className="form-check">
                                                            <input className="form-check-input" type="radio" name={'exampleRadios' + index} id={'exampleRadios' + index + question.id} value={question.valeur} onChange={(e) => this.handleRadiosChange(e)} />
                                                            <label className="form-check-label" htmlFor={'exampleRadios' + index + 1}>
                                                                {question.valeur}
                                                            </label>
                                                        </div>
                                                    )
                                                }
                                                <br />
                                            </div>
                                        )
                                    }
                                    <button type="submit" className="btn btn-primary">Valider</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <Footer />
            </div>
        );
    }
}

export default Qcm;