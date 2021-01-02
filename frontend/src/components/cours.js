import React from 'react';

function Cours(props) {
    return (
        <div className="col-12 col-lg-4">
            <div className="card mb-4 mb-lg-0 border-light shadow-sm">
                <img src={props.imageCours} alt={props.descriptifImage} className="card-img-top" />
                <div className="card-body">
                    <h5 className="card-title">{props.titreCours}</h5>
                    <p className="card-text">{props.descriptionCours}</p>
                    <a href="lesson-1.html" className="btn btn-primary stretched-link">Démarrer l'apprentissage</a>
                </div>
            </div>
        </div>
    )
}

export default Cours;
