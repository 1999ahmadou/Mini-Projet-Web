import React from 'react';
import {Link } from 'react-router-dom';


function Cours(props) {
    return (
        <div className="col-12 col-lg-4 mb-4">
            <div className="card mb-4 mb-lg-0 border-light shadow-sm">
                <img src={props.imageCours} alt={props.descriptifImage} height={200} className="card-img-top" />
                <div className="card-body">
                    <h5 className="card-title">{props.titreCours}</h5>
                    <p className="card-text">{props.descriptionCours}</p>
                    <Link to="/detailCours" className="btn btn-primary stretched-link">Démarrer l'apprentissage</Link>
                </div>
            </div>
        </div>
    )
}

export default Cours;
