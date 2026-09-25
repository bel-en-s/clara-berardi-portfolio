import "./ProjectDetail.css";
import { Link, useParams } from "react-router-dom";
import transition from "../../transition";

import Masonry from "react-masonry-css";
import Footer from "../../components/Footer/Footer";

import projects from "../../data/projects.json";
import projectTypes from "../../data/projectTypes.json";

const ProjectDetail = () => {
  const { slug } = useParams();
  const project = projects.projects.find((p) => p.slug === slug);

  if (!project) {
    return (
      <div className="project-detail">
        <div className="divider"></div>
        <div className="container">
          <h1 className="section-title">Project not found</h1>
          <div className="whitespace-100"></div>
          <p>
            <Link to="/" id="a-underline">
              Back to work
            </Link>
          </p>
        </div>
        <div className="divider"></div>
        <Footer />
      </div>
    );
  }

  const type = projectTypes.types[project.type];
  const metaFields = type.fields.filter((f) => project[f.key]);

  const breakpoints = {
    default: 3,
    1100: 2,
    700: 1,
  };

  return (
    <div className="project-detail">
      <div className="divider"></div>
      <div className="container">
        <div className="project-head">
          <div className="project-head-col">
            <h1 className="section-title">{project.title}</h1>
            <p className="project-brand">{project.brand}</p>
          </div>
          <div className="project-head-col">
            <p>{type.label}</p>
            {metaFields.map((f) => {
              const value = Array.isArray(project[f.key])
                ? project[f.key].join(", ")
                : project[f.key];
              return (
                <p className="project-copy-sec" key={f.key}>
                  {f.label}: {value}
                </p>
              );
            })}
          </div>
        </div>

        <div className="project-sub-head">
          <div className="back-link">
            <Link to="/" id="a-underline">
              Back to work
            </Link>
          </div>
          <div className="project-tags">
            {project.categories.map((category) => (
              <span className="tag" key={category}>
                {category}
              </span>
            ))}
          </div>
        </div>

        <div className="project-description">
          <p>{project.description}</p>
        </div>

        <div className="project-featured">
          {project.video ? (
            <video src={project.video} controls playsInline />
          ) : (
            <img src={project.cover} alt={project.title} />
          )}
        </div>
      </div>
      <div className="divider"></div>

      <div className="container">
        <div className="project-gallery">
          <Masonry
            breakpointCols={breakpoints}
            className="my-masonry-grid"
            columnClassName="my-masonry-grid_column"
          >
            {project.images.map((image, index) => (
              <div key={index}>
                <img src={image} alt="" />
              </div>
            ))}
          </Masonry>
        </div>
      </div>
      <div className="divider"></div>

      {project.credits.length > 0 && (
        <>
          <div className="container">
            <div className="credits">
              <div className="credits-title">
                <h2 className="section-h2">Credits</h2>
              </div>
              <div className="credits-groups">
                {project.credits.map((group) => (
                  <div className="credit-group" key={group.group}>
                    <h3>{group.group}</h3>
                    {group.items.map((item) => (
                      <p className="credit-item" key={item.role}>
                        <span className="credit-role">{item.role}</span>
                        {item.name}
                      </p>
                    ))}
                  </div>
                ))}
              </div>
            </div>
          </div>
          <div className="divider"></div>
        </>
      )}

      <Footer />
    </div>
  );
};

const ProjectDetailPage = transition(ProjectDetail);

export default ProjectDetailPage;
