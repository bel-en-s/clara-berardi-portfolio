import "./Studio.css";
import Footer from "../../components/Footer/Footer";
import transition from "../../transition";

const previousExperience = [
  "O Capital Agency",
  "Sacco Creative Group",
  "Pacifico Creative Studio",
  "Gobierno de la Ciudad de Buenos Aires",
  "Vaso",
];

const services = [
  "Creative Direction",
  "Art Direction",
  "Creative Strategy",
  "Brand Strategy",
  "Branding & Visual Identity",
  "Concept Development",
  "Graphic Design",
  "Communication Strategy",
  "Marketing Strategy",
];

const clientHistory = [
  {
    category: "Brands & Institutions",
    clients: [
      "Grupo Gonher",
      "Hospital General de Niños P. Elizalde",
      "Lubral",
      "Shell",
    ],
  },
  {
    category: "Food, Wellness & Hospitality",
    clients: [
      "2GOOD",
      "Alian Labs",
      "Cabernario Wines",
      "Core House",
      "Doña Paula",
      "Full of Beans",
      "Los Maitenes",
      "M&K",
      "Mar Real Estate",
    ],
  },
  {
    category: "Fashion & Lifestyle",
    clients: [
      "CrazySkate",
      "Ear Link",
      "Fils Home",
      "Kaptivate",
      "Marie Birdie",
      "Paogi",
      "Rudy Sport",
      "Sisco.ar",
    ],
  },
  {
    category: "Services & Retail",
    clients: [
      "Ele Seguridad",
      "Electrónica Megatone",
      "Musimundo",
      "ProlijoLimp",
    ],
  },
];

const Studio = () => {
  return (
    <div className="studio">
      <div className="divider"></div>

      <div className="container">
        <section className="about-hero">
          <h1 className="section-title">About</h1>
          <div className="about-hero-info">
            <h2 className="about-name">Clara Berardi</h2>
          </div>
        </section>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="about-intro">
          <h2 className="section-h2">
            Clara Berardi is a Creative Director and Brand Strategist based in
            Buenos Aires.
          </h2>
        </section>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="about-copy">
          <div className="about-copy-col">
            <p>
              Her practice sits between strategy and creativity, bringing both
              together as part of the same process. She works across branding,
              visual identity, communication, marketing and creative direction,
              looking at brands from a 360° perspective.
            </p>
            <br />
            <p>
              With a background that moves across different disciplines,
              Clara&apos;s work is difficult to define within a single category.
              She moves fluidly between strategic thinking and visual execution,
              connecting business objectives with cultural, creative and visual
              ideas.
            </p>
          </div>
          <div className="about-copy-col">
            <p>
              Her work spans the development of brand strategies, identities,
              campaigns and content, from early-stage concepts to full creative
              execution. She leads multidisciplinary teams and works across the
              different layers of a brand to build a coherent and distinctive
              vision.
            </p>
            <br />
            <p>
              Since starting her career as a strategist in 2022, she has worked
              with national and international brands across fashion, lifestyle,
              food, wellness, technology and other industries. Her experience
              includes established companies, emerging brands and startups, with
              projects spanning Argentina, the United States and Canada.
            </p>
          </div>
        </section>
      </div>
      <div className="divider"></div>

      <div className="container">
        <p className="about-note">
          Clara is the creative lead of <span>Jabali Estudio</span>
        </p>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="about-section">
          <div className="about-section-col">
            <h1 className="section-title">Previous</h1>
          </div>
          <div className="about-section-col">
            <div className="previous-list">
              {previousExperience.map((item) => (
                <p key={item}>{item}</p>
              ))}
            </div>
          </div>
        </section>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="about-section">
          <div className="about-section-col">
            <h1 className="section-title">Services</h1>
          </div>
          <div className="about-section-col">
            <div className="services-list">
              {services.map((item) => (
                <p key={item}>{item}</p>
              ))}
            </div>
          </div>
        </section>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="about-clients">
          <h1 className="section-title">Client History</h1>
          <div className="clients-grid">
            {clientHistory.map((group) => (
              <div className="client-group" key={group.category}>
                <h3 className="client-group-title">{group.category}</h3>
                <ul className="client-group-list">
                  {group.clients.map((client) => (
                    <li key={client}>{client}</li>
                  ))}
                </ul>
              </div>
            ))}
          </div>
        </section>
      </div>
      <div className="divider"></div>

      <Footer />
    </div>
  );
};

const StudioPage = transition(Studio);

export default StudioPage;
