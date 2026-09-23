import { createPortal } from "react-dom";
import { motion } from "framer-motion";

const transition = (OriginalComponent) => {
  function TransitionedComponent(props) {
    return (
      <>
        <OriginalComponent {...props} />

        {createPortal(
          <>
            <motion.div
              className="slide-in"
              initial={{ scaleX: 0 }}
              animate={{ scaleX: 0 }}
              exit={{ scaleX: 1 }}
              transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
            />
            <motion.div
              className="slide-out"
              initial={{ scaleX: 1 }}
              animate={{ scaleX: 0 }}
              exit={{ scaleX: 0 }}
              transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
            />
          </>,
          document.body
        )}
      </>
    );
  }

  return TransitionedComponent;
};

export default transition;
