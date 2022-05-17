import React from 'react';
import ReactDOM from 'react-dom';
import logo from '../images/rapidologo.png'

function Navbar() {
    return (
    <nav className="navbar navbar-light navbar-expand-md bg-white justify-content-center">
        <div className="container-fluid">

            <a href="/" className="navbar-brand d-flex w-50 me-auto fs-4"><img src={logo} alt="logo" /></a>

            <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
                <span className="navbar-toggler-icon"></span>
            </button>

            <div className="navbar-collapse collapse w-100">

                <ul className="navbar-nav w-100 justify-content-center">
                    <li className="nav-item fs-4">
                        <a className="nav-link text-secondary" href="/about">About</a>
                    </li>
                    <li className="nav-item fs-4">
                        <a className="nav-link text-secondary" href="/services">Services</a>
                    </li>
                    <li className="nav-item fs-4">
                        <a className="nav-link text-secondary" href="/pricing">Pricing</a>
                    </li>
                </ul>

                <ul className="nav navbar-nav w-100 justify-content-end">

                    <div className="dropdown">
                        <button className="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <p className="nav-link fs-5 text-body fw-bold">Sign In</p>
                        </button>
                        <ul className="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a className="dropdown-item" href="/customer/login">Customer Sign In</a></li>
                            <li><a className="dropdown-item" href="/mechanic/login">Mechanic Sign In</a></li>
                        </ul>
                    </div>

                    <div className="dropdown">
                        <button className="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <p className="nav-link fs-5 text-body fw-bold">Register</p>
                        </button>
                        <ul className="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a className="dropdown-item" href="/customer/registration">Customer Register</a></li>
                            <li><a className="dropdown-item" href="/mechanic/registration">Mechanic Register</a></li>
                        </ul>
                    </div>

                    <a className="nav-link pt-6" href="#">
                        <button type="button" className="btn btn-outline-primary">Call: 1300 468 000</button>
                    </a>

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
