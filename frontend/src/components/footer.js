import React from 'react';

function Footer(props) {
    return (
        <div className="bg-white mt-5">
            <div className="container">
                <div className="row pt-4 pb-3">
                    <div className="col">
                        <ul className="list-inline text-center">
                            <li className="list-inline-item"><a href="#a"><h4>À propos</h4></a></li>
                            <li className="list-inline-item">&middot;</li>
                            <li className="list-inline-item"><a href="#a"><h4>Vie privée</h4></a></li>
                            <li className="list-inline-item">&middot;</li>
                            <li className="list-inline-item"><a href="#a"><h4>Conditions d'utilisations</h4></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Footer;
