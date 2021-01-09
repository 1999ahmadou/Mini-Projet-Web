import React, { PureComponent } from 'react';

class Question extends PureComponent {

    constructor(props) {
        super(props)

        this.state = {
            id: this.props.match.params.id,
            tableQuestion: [],
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
                console.log(data)
                this.setState({ tableQuestion: data })
            })
            .catch(error => {
                this.setState({ errorMessage: error.toString() });
                console.error('There was an error!', error);
            });
    }

    render() {
        return (
            <div>
                <h3><strong>Question {this.props.index + 1} </strong></h3>
                <hr />
                <h4>{this.props.tab.contenu}</h4>
                <div className="form-check">
                    <input className="form-check-input" type="radio" name={'exampleRadios' + this.props.index} id={'exampleRadios' + this.props.index + 1} value="option1" onChange={(e) => this.handleRadiosChange(e)} />
                    <label className="form-check-label" htmlFor={'exampleRadios' + this.props.index + 1}>
                        Valeur 1
                </label>
                </div>
                <div className="form-check">
                    <input className="form-check-input" type="radio" name={'exampleRadios' + this.props.index} id={'exampleRadios' + this.props.index + 1} value="option2" onChange={(e) => this.handleRadiosChange(e)} />
                    <label className="form-check-label" htmlFor="exampleRadios2">
                        Valeur 2
                </label>
                </div>
                <br />
            </div>
        )
    }
}

export default Question;