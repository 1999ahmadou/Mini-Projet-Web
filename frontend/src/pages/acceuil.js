import React from 'react';
import Card from '../components/card';
import Jumbotron from '../components/jumbotron';
import Transformer from '../components/transformer';
import Footer from '../components/footer';

function Acceuil() {
    return (
        <div>
            <Jumbotron />
            <div className="container">
                <div className="row">
                    <Card image="images/home/certificate.png" alternative="certificat" titre="Devenez diplômé" paragraphe="De zéro à héros, obtenez un diplôme en informatique." />
                    <Card image="images/home/instruction.png" alternative="instrocteur" titre="Formateurs de qualités" paragraphe="Tous nos cours sont réalisés par les meilleurs informaticiens." />
                    <Card image="images/home/job.png" alternative="job search" titre="Un travail graranti" paragraphe="Nous vous garantissons un emploi à l'issue de votre formation." />
                </div>
            </div>
            <Transformer />
            <Footer />
        </div>
    )
}

export default Acceuil;
