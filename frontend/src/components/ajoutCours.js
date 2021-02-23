import React, { PureComponent } from 'react'
import Footer from '../components/footer';

class AjoutCours extends PureComponent {
    static propTypes = {}

    constructor(props) {
        super(props)

        this.state = {
            titre: "",
            descriptif: "",
            image: "",
            contenu: ""
        }
    }

    handleChangeTitre(e) {
        this.setState({
            titre: e.target.value
        })
    }

    handleChangeDescriptif(e) {
        this.setState({
            descriptif: e.target.value
        })
    }

    handleChangeURL(e){
        this.setState({
            contenu:e.target.value
        })
    }

    handleChangeImage(e){
        this.setState({
            contenu:e.target.files[0]
        })
        //console.log(e.target.files[0]);
    }

    render() {
        return (
            <div>
                <div className="container">
                    <div className="row">
                        <form onSubmit={(e) => this.handleSubmit(e)}>
                            <div className="card">
                                <div className="card-header text-center">
                                    <h3>Ajout d'un cours</h3>
                                </div>
                                <div className="card-body">
                                    <div className="form-group">
                                        <label htmlFor="titre" ><strong>Titre:</strong></label>
                                        <input type="text" className="form-control" id="titre" onChange={(e) => this.handleChangeTitre(e)} />
                                    </div>
                                    <div className="form-group">
                                        <label htmlFor="descriptif" ><strong>Descriptif:</strong></label>
                                        <input type="text" className="form-control" id="descriptif" onChange={(e) => this.handleChangeDescriptif(e)} />
                                    </div>
                                    <label htmlFor="basic-url">URL du Cours</label>
                                    <div className="input-group mb-3">
                                        <div className="input-group-prepend">
                                            <span className="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                        </div>
                                        <input type="text" className="form-control" id="basic-url" aria-describedby="basic-addon3" onChange={(e) => this.handleChangeURL(e)} />
                                    </div>
                                    <div className="form-group">
                                        <label htmlFor="exampleFormControlFile1">Image du cours</label>
                                        <input type="file" className="form-control-file" id="exampleFormControlFile1" onChange={(e) => this.handleChangeImage(e)} />
                                    </div>
                                    <button type="submit" className="btn btn-secondary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <Footer />
            </div>
        )
    }
}

export default AjoutCours;