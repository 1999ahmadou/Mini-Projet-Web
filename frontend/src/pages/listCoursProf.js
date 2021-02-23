import React, { PureComponent } from 'react'
import { Link } from 'react-router-dom';
import Cours from '../components/cours';
import Footer from '../components/footer';

class ListCoursProf extends PureComponent {
    static propTypes = {}

    constructor(props) {
        super(props)

        this.state = {
            table: []
        }
    }

    componentDidMount() {
        fetch('http://localhost:3001/cours')//http://127.0.0.1:8000/api/Courses
            .then(response => response.json())
            .then((resultat) => {
                this.setState({
                    table: resultat
                })
            })
    }

    render() {
        return (
            <div>
                <div className="container">
                    <div className="row my-3">
                        <div className="col-6">
                            <h1>Cours</h1>
                        </div>
                        <div className="col-6 auto">
                            <Link to="/addCours" className="float-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </Link>
                        </div>
                    </div>
                    <div className="row mb-3">
                        <div className="col">
                            <input className="form-control" id="searchInput" type="text" placeholder="Search.." />
                        </div>
                    </div>
                    <div className="row" id="lessonList">
                        {
                            this.state.table.map((tab) =>
                                <Cours key={tab.id} imageCours={tab.picture} idCours={tab.id} descriptifImage="css3" titreCours={tab.titre} descriptionCours={tab.description} />
                            )
                        }
                    </div>
                </div>
                <Footer />
            </div>
        )
    }
}

export default ListCoursProf;