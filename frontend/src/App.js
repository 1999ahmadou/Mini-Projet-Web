import './App.css';
import Acceuil from './pages/acceuil';
import ListCours from './pages/listCours';
import Login from './pages/login';
import Inscription from './pages/inscription';
import DetailCours from './pages/detail-cours';
import { Route, Switch, Link, BrowserRouter as Router } from 'react-router-dom';
import Qcm from './pages/qcm';
import ListCoursProf from './pages/listCoursProf';
import AjoutCours from './components/ajoutCours';

function App() {
  return (
    <Router>
      <div className="bg-secondary ">
        <div className="container">
          <div className="row ">
            <nav className="col navbar navbar-expand-lg navbar-dark">
              <div id="navbarContent" className="collapse navbar-collapse">
                <ul className="navbar-nav">
                  <li className="nav-item">
                    <Link to="/" className="navbar-brand">
                       <strong>INFOSCHCOOL</strong>
                    </Link>
                  </li>
                  <li className="nav-item active">
                    <Link to="/" className="nav-link">ACCEUIL</Link>
                  </li>
                  <li className="nav-item">
                    <Link to="/cours" className="nav-link">COURS</Link>
                  </li>
                </ul>
                <p>&emsp; &emsp; &emsp; &emsp; &emsp;&emsp;&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</p>
                <ul className="navbar-nav">
                  <li className="nav-item">
                    <Link to="/login" className="nav-link">CONNECTION</Link>
                  </li>
                  <li className="nav-item">
                    <Link to="/inscription" className="nav-link">S'INSCRIRE</Link>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
      <div>
        <Switch>
          <Route exact path="/" component={Acceuil} />
          <Route exact path="/cours" component={ListCours} />
          <Route exact path="/prof" component={ListCoursProf}/>
          <Route exact path="/login" component={Login} />
          <Route exact path="/inscription" component={Inscription} />
          <Route exact path="/detailCours/:id" component={DetailCours} />
          <Route exact path="/addCours" component={AjoutCours}/>
          <Route exact path="/qcm/:id" component={Qcm}/>
        </Switch>
      </div>
    </Router>
  );
}

export default App;
