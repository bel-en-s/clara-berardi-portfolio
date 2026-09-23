import { Link, useLocation } from "react-router-dom";
import "./Navbar.css";

const Navbar = () => {
  const location = useLocation();
  return (
    <div
      className={`navbar ${
        location.pathname === "/thinking" ? "navbar-dark" : ""
      }`}
    >
      <div className="container">
        <div className="navbar-logo">
          <Link to="/" className="navbar-brand">
            <span className="brand-name">Clara Berardi</span>
          </Link>
        </div>
        <div className="navbar-items">
          <div className="navbar-item">
            <Link to="/work">Work</Link>
          </div>
          <div className="navbar-item">
            <Link to="/studio">Studio</Link>
          </div>
          <div className="navbar-item">
            <Link to="/contact">Contact</Link>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Navbar;
