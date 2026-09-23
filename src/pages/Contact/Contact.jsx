import "./Contact.css";
import Footer from "../../components/Footer/Footer";
import transition from "../../transition";

const Contact = () => {
  return (
    <div className="contact">
      <div className="divider"></div>

      <div className="container">
        <h1 className="section-title">Contact</h1>
        <div className="whitespace-100"></div>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="contact-info">
          <div className="contact-info-col">
            <h2 className="section-h2">
              For new business, collaborations, and everything in between —
              write to me and let&apos;s make something good together.
            </h2>
          </div>
          <div className="contact-info-col">
            <div className="contact-info-sub-col">
              <p>Based in</p>
              <p className="sec-contact">Buenos Aires, Argentina</p>

              <br />

              <p>Email</p>
              <p className="sec-contact">
                <a href="mailto:hola@claraberardi.com">hola@claraberardi.com</a>
              </p>
            </div>
            <div className="contact-info-sub-col">
              <a href="#">Instagram</a> <br />
              <a href="#">LinkedIn</a> <br />
              <a href="#">Behance</a>
            </div>
          </div>
        </section>
      </div>
      <div className="divider"></div>

      <Footer />
    </div>
  );
};

const ContactPage = transition(Contact);

export default ContactPage;
