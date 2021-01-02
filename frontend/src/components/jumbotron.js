import React from 'react';

function Jumbotron(props) {
    return (
        <section>
            <div className="container">
                <div className="row shadow" id="sec">
                    <div className="col-6" id="textJumbo">
                        <strong>
                            <h1>Ensemble nous,<br />apprenons</h1>
                        </strong>
                        <h5><span>Continuez à vous développer avec nous.<br />Les cours sont à partir de 11,99 $US<br /> jusqu'au 27 décembre.</span></h5>
                        <p className="lead">
                            <a className="btn btn-primary btn-lg" href="#f" role="button">EN SAVOIR PLUS</a>
                        </p>
                    </div>
                    <div className="col-6">
                        <img src="images/pencil-boy-sm.png" width="300px" height="300px" alt="A student" />
                    </div>
                </div>
            </div>
        </section>
    )
}

export default Jumbotron;
