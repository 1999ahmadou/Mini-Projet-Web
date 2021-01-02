import React from 'react';

function Card(props) {
    return (
        <div className="col-12 col-lg-4">
            <div className="card mb-4 mb-lg-0  shadow">
                <img src={props.image} alt={props.alternative} className="card-img-top" />
                <div className="card-body">
                    <h5 className="card-title">{props.titre}</h5>
                    <p className="card-text">{props.paragraphe}</p>
                </div>
            </div>
        </div>
    )
}

export default Card;
