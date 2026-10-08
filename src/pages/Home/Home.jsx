import "./Home.css";
import { useLayoutEffect, useRef } from "react";
import { createPortal } from "react-dom";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import Footer from "../../components/Footer/Footer";
import transition from "../../transition";

import Project from "../../components/Project/Project";

import projects from "../../data/projects.json";

gsap.registerPlugin(ScrollTrigger);

const Home = () => {
  const root = useRef(null);
  const trackRef = useRef(null);

  useLayoutEffect(() => {
    const ctx = gsap.context(() => {
      const mm = gsap.matchMedia();

      mm.add("(min-width: 901px)", () => {
        const track = trackRef.current;

        const getScrollAmount = () => track.scrollWidth - window.innerWidth;

        gsap.to(track, {
          x: () => -getScrollAmount(),
          ease: "none",
          scrollTrigger: {
            trigger: ".work-section",
            start: "top top+=58",
            end: () => "+=" + getScrollAmount(),
            pin: true,
            scrub: 1,
            invalidateOnRefresh: true,
          },
        });
      });
    }, root);

    return () => ctx.revert();
  }, []);

  return (
    <div className="home" ref={root}>
      {/* work section */}
      <div className="work-section">
        <div className="projects-grid" ref={trackRef}>
          {projects.projects.map((project) => (
            <Project key={project.slug} project={project} />
          ))}
        </div>
      </div>

      {/* footer: fixed on desktop (outside ScrollSmoother), in-flow on mobile */}
      <div className="home-footer-flow">
        <div className="divider"></div>
        <Footer />
      </div>
      {createPortal(<Footer fixed />, document.body)}
    </div>
  );
};

const HomePage = transition(Home);

export default HomePage;
