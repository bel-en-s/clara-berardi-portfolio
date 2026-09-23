import PropTypes from "prop-types";
import { Link } from "react-router-dom";
import "./Project.css";

const Project = ({ project }) => {
  return (
    <div className="project">
      <Link to={`/work/${project.slug}`}>
        <div className="project-img">
          <img src={project.cover} alt={project.title} />
        </div>
        <div className="project-title">
          <p>{project.title}</p>
        </div>
        <div className="project-category">
          <p>{project.categories.join(" · ")}</p>
        </div>
      </Link>
    </div>
  );
};

Project.propTypes = {
  project: PropTypes.shape({
    slug: PropTypes.string.isRequired,
    cover: PropTypes.string.isRequired,
    title: PropTypes.string.isRequired,
    categories: PropTypes.arrayOf(PropTypes.string).isRequired,
  }).isRequired,
};

export default Project;
