import { useState } from "react";
import "./Work.css";
import { Link } from "react-router-dom";
import Footer from "../../components/Footer/Footer";
import transition from "../../transition";

import Project from "../../components/Project/Project";

import projects from "../../data/projects.json";
import projectTypes from "../../data/projectTypes.json";

const typeKeys = ["all", ...Object.keys(projectTypes.types)];

const Work = () => {
  const [active, setActive] = useState("all");

  const filtered =
    active === "all"
      ? projects.projects
      : projects.projects.filter((p) => p.type === active);

  return (
    <div className="work-page">
      <div className="divider"></div>
      <div className="container">
        <div className="work-section">
          <div className="work-section-header">
            <div className="section-header-title">
              <h1 className="section-title">Work</h1>
            </div>
            <div className="section-header-copy">
              <p>
                <Link to="/" id="a-underline">
                  Back
                </Link>
              </p>
              <p>({filtered.length})</p>
            </div>
          </div>

          <div className="work-filter">
            {typeKeys.map((key) => (
              <button
                key={key}
                className={`filter-chip ${active === key ? "active" : ""}`}
                onClick={() => setActive(key)}
              >
                {key === "all" ? "All" : projectTypes.types[key].label}
              </button>
            ))}
          </div>

          <div className="projects-grid">
            {filtered.map((project) => (
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

const WorkPage = transition(Work);

export default WorkPage;
