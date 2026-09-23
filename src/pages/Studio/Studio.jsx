import "./Studio.css";
import Footer from "../../components/Footer/Footer";
import transition from "../../transition";

const Studio = () => {
  return (
    <div className="studio">
      <div className="divider"></div>

      <div className="container">
        <h1 className="section-title">About</h1>
        <div className="whitespace-100"></div>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="about-intro">
          <div className="about-intro-col">
            <h2 className="section-h2">
              Clara Berardi is a creative lead based in Buenos Aires, working at
              the intersection of brand strategy, creative direction, and visual
              storytelling.
            </h2>
          </div>
          <div className="about-intro-col about-intro-img">
            <img src="/assets/textures/texture-2.jpg" alt="" />
          </div>
        </section>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="about-copy">
          <div className="about-copy-col">
            <p>
              From AI-driven audiovisual pieces for Shell to brand identities
              for Rudy Sport, Core House, and M&K, Clara&apos;s work spans
              campaign production, brand strategy, and collective curation.
            </p>
            <br />
            <p>
              She leads creative teams across disciplines, shaping a consistent
              visual language for every project — from the first concept to the
              final delivery — while keeping the brand&apos;s essence at the
              center.
            </p>
            <br />
            <p>
              Her approach brings together strategy and craft, building
              identities and stories that feel both contemporary and enduring.
            </p>
          </div>
          <div className="about-copy-col">
            <p>
              Good work takes time, commitment, and close collaboration. Clara
              values long-lasting relationships where trust, openness, and
              progress drive the process.
            </p>
            <br />
            <p>
              Working with ambitious brands and teams around the world, she
              helps turn ideas into tangible, immersive experiences.
            </p>
          </div>
        </section>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="about-texture">
          <img src="/assets/textures/texture-1.jpg" alt="" />
        </section>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="about-section">
          <div className="about-section-col">
            <h1 className="section-title">Capabilities</h1>
          </div>
          <div className="about-section-col">
            <div className="capability-list">
              <p>Creative Direction</p>
              <p>Brand Strategy</p>
              <p>Branding</p>
              <p>Campaign Production</p>
              <p>AI Visual Direction</p>
              <p>Marketing</p>
              <p>Graphic Design</p>
              <p>Curation</p>
            </div>
          </div>
        </section>
      </div>
      <div className="divider"></div>

      <div className="container">
        <section className="about-section">
          <div className="about-section-col">
            <h1 className="section-title">Selected Clients</h1>
          </div>
          <div className="about-section-col">
            <div className="client-list">
              <h3>Shell</h3>
              <h3>Rudy Sport</h3>
              <h3>M&K</h3>
              <h3>CrazySkate</h3>
              <h3>Fils Home</h3>
              <h3>Core House</h3>
              <h3>Los Maitenes</h3>
              <h3>2GOOD</h3>
            </div>
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
