import "./Footer.css";
import { Link } from "react-router-dom";

const Footer = ({ fixed = false }) => {
  return (
    <div className={`footer${fixed ? " footer-fixed" : ""}`}>
      <div className="container">
        <div className="footer-item">
          <p>
            <Link to="/" className="footer-brand">
              Clara Berardi
            </Link>
          </p>
        </div>
        <div className="footer-item" id="footer-contact">
          <p>
            Work with me — write to{" "}
            <a href="mailto:claraberardicc@gmail.com">claraberardicc@gmail.com</a>
          </p>
        </div>
        <div className="footer-item footer-credit">
          <p>Developed by</p>
          <a
            href="https://divinodivino.com"
            target="_blank"
            rel="noreferrer"
            className="footer-credit-link"
          >
            <img
              src="/logo-dd.png"
              alt="divino divino"
              className="footer-logo"
            />
          </a>
        </div>
      </div>
    </div>
  );
};

export default Footer;
