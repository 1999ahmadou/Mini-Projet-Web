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
       /* fetch(`http://localhost:3001/qcm/${this.state.id}`)
            .then(async response => {
                const data = await response.json();

                // check for error response
                if (!response.ok) {
                    // get error message from body or default to response statusText
                    const error = (data && data.message) || response.statusText;
                    return Promise.reject(error);
                }
                console.log(data)
                this.setState({ tableQuestion: data.questions, titre: data.titre })
            })
            .catch(error => {
                this.setState({ errorMessage: error.toString() });
                console.error('There was an error!', error);
            });*/

            fetch(`http://127.0.0.1:8000/api/qcm/${this.state.id}`)
            .then(async response => {
                const data = await response.json();

                // check for error response
                if (!response.ok) {
                    // get error message from body or default to response statusText
                    const error = (data && data.message) || response.statusText;
                    return Promise.reject(error);
                }
                
                //console.log(data.data[0])
                this.setState({ tableQuestion: data.data[0].questions, titre: data.data[0].title })
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
            var liste=[];
            liste=this.state.tableQuestion.map((table,index)=>
                table.propositions.map(proposition=>{
                    var radio=document.getElementsByName('exampleRadios'+index)
                   // console.log(radio)
                    var mvaleur=[];
                    for (let i = 0; i < radio.length; i++) {
                        if(radio[i].checked){
                            mvaleur.push(radio[i].value);
                            //console.log(mvaleur);
                        }
                        
                    }
                    //console.log(mvaleur)
                   return mvaleur;
                })
                )
            //console.log(liste[0])
            for (let index = 0; index < liste.length; index++) {
                this.setState({reponse:this.state.reponse.push(liste[index][0][0])})
            }

            const[rep1,rep2,rep3,rep4,rep5]=this.state.reponse;

            const requestOptions = {
                method: 'GET',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ tab:[{
                    rep1:rep1,
                    rep2:rep2,
                    rep3:rep3,
                    rep4:rep4,
                    rep5:rep5
                }]})
            };
            console.log(requestOptions);
            console.log(rep1)

            fetch(`http://localhost:3001/bonnerep/${this.state.id}`)
            .then(async response => {
                const data = await response.json();
                //console.log(data.questionAnswer);
                var good=0;
                var montab=new Array(5);
                montab=data.questionAnswer;

               // console.log(montab[1].rep);
                if(montab[0].rep===rep1){
                    good=good+1;
                }
                if(montab[1].rep===rep2){
                    good=good+1;
                }
                if(montab[2].rep===rep3){
                    good=good+1;
                }
                if(montab[3].rep===rep4){
                    good=good+1;
                }
                if(montab[4].rep===rep5){
                    good=good+1;
                }
                 
                if(good>=3){
                    alert("Bravo vous avez validé le qcm et vous avez "+good+" bonne reponse")
                }
                else{
                    alert("Desolé vous n'avez pas validé le qcm, veillez reessayer une autre fois ")
                }

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
                                                <h4>{tab.content}</h4>
                                                {
                                                    tab.propositions.map((question) =>
                                                        <div key={question.id} className="form-check">
                                                            <input className="form-check-input" type="radio" name={'exampleRadios' + index} id={'exampleRadios' + index + question.id} value={question.value} onChange={(e) => this.handleRadiosChange(e)} />
                                                            <label className="form-check-label" htmlFor={'exampleRadios' + index + 1}>
                                                                {question.value}
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