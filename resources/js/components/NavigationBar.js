import React from 'react';
import ReactDOM from 'react-dom';
import logo from '../images/rapidologo.png'

function Navbar() {
    return (
    <nav className="navbar navbar-light navbar-expand-md bg-white justify-content-center">
        <div className="container">

            <a href="/" className="navbar-brand d-flex w-50 me-auto fs-4"><img src={logo} alt="logo" /></a>

            <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
                <span className="navbar-toggler-icon"></span>
            </button>

            <div className="navbar-collapse collapse w-100">

                <ul className="navbar-nav w-100 justify-content-center">
                    <li className="nav-item fs-4">
                        <a className="nav-link text-secondary" href="#">About</a>
                    </li>
                    <li className="nav-item fs-4">
                        <a className="nav-link text-secondary" href="">Services</a>
                    </li>
                    <li className="nav-item fs-4">
                        <a className="nav-link text-secondary" href="#">Pricing</a>
                    </li>
                    <li className="nav-item fs-4">
                        <a className="nav-link text-secondary" href="#">Testimonials</a>
                    </li>
                    <li className="nav-item fs-4">
                        <a className="nav-link text-secondary" href="">Help</a>
                    </li>
                </ul>

                <ul className="nav navbar-nav ms-auto w-100 justify-content-end">
                    <li className="nav-item ">
                        <a className="nav-link fs-4 text-body fw-bold" href="#">Sign In</a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="#">
                            <button type="button" className="btn btn-outline-primary">Call: 1300 468 000</button>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    );
}

export default Navbar;

if (document.getElementById('navbar')) {
    ReactDOM.render(<Navbar />, document.getElementById('navbar'));
}
