import React from 'react';
import Cours from '../components/cours';
import Footer from '../components/footer';

function ListCours() {
    return (
        <div>
            <div className="container">
                <div className="row my-3">
                    <div className="col">
                        <h1>Cours</h1>
                    </div>
                </div>
                <div className="row mb-3">
                    <div className="col">
                        <input className="form-control" id="searchInput" type="text" placeholder="Search.." />
                    </div>
                </div>
                <div className="row" id="lessonList">
                    <Cours imageCours="images/css.jpeg" descriptifImage="css3" titreCours="Créez des Animations CSS" descriptionCours="Vous allez plonger dans le monde des animations CSS pour donner vie à vos pages web !" />
                    <Cours imageCours="images/js.jpeg" descriptifImage="js" titreCours="Programmer avec JavaScript" descriptionCours="Ce cours est conçu pour vous enseigner les bases du langage de programmation JavaScript." />
                    <Cours imageCours="images/swift.jpeg" descriptifImage="js" titreCours="Les fondamentaux de Swift" descriptionCours="Découvrez le développement iOS et réalisez des applications taillées pour l'iPhone et l'iPad !" />
                </div>
            </div>
            <Footer />
        </div>
    )
}

export default ListCours;
