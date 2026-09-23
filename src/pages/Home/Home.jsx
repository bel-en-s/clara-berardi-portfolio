import "./Home.css";
import { Link } from "react-router-dom";
import Footer from "../../components/Footer/Footer";
import transition from "../../transition";

import Project from "../../components/Project/Project";

import projects from "../../data/projects.json";

const Home = () => {
  return (
    <div className="home">
      {/* hero section */}
      <div className="container">
        <div className="hero-img">
          <img src="/assets/projects/shell/shell-2.png" alt="" />
        </div>

        <div className="hero-copy">
          <h1>
            Clara Berardi is a creative lead based in Buenos Aires, shaping
            brands and immersive visual stories for ambitious companies
            worldwide. &nbsp;{" "}
            <Link to="/studio"> About me</Link>
          </h1>
        </div>
      </div>
      <div className="divider"></div>

      {/* work section */}
      <div className="container">
        <div className="work-section">
          <div className="work-section-header">
            <div className="section-header-title">
              <h1 className="section-title">Selected Work</h1>
            </div>
            <div className="section-header-copy">
              <p>
                <Link to="/work" id="a-underline">
                  View All
                </Link>
              </p>
              <p>({projects.projects.length})</p>
            </div>
          </div>

          <div className="projects-grid">
            {projects.projects.slice(0, 6).map((project) => (
              <Project key={project.slug} project={project} />
            ))}
          </div>
        </div>
      </div>
      <div className="divider"></div>

      <Footer />
    </div>
  );
};

const HomePage = transition(Home);

export default HomePage;
