import React from 'react';
import './transformez.css';


function Transformer(props) {
    return (
        <div className="row" id="about">
            <div className="col-12 col-lg-7 text-center">
                <video width={600} height={300} controls>
                    <source src="img/v.mp4" type="video/mp4" />
                </video>
            </div>
            <div className="col-12 col-lg-5 texte">
                <strong>
                    <h1>Transformez votre vie<br /> grâce à l'apprentissage</h1>
                </strong>
                <h4>Ahmadou Kassoum a débuté une carrière dans le développement de logiciels en suivant des cours sur Infoschool. Et vous, qu'allez-vous réaliser ?</h4>
            </div>
        </div>
    )
}

export default Transformer;
