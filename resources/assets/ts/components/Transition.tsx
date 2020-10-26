import React, {
  ReactNode,
  useRef,
  useEffect,
  useContext,
} from "react";
import { CSSTransition as ReactCSSTransition } from "react-transition-group";

interface TransitionProps {
  show?: boolean;
  enter?: string;
  enterFrom?: string;
  enterTo?: string;
  leave?: string;
  leaveFrom?: string;
  leaveTo?: string;
  appear?: string | boolean;
  children: ReactNode;
}

interface ParentContextProps {
  parent: {
    show?: boolean;
    appear?: string | boolean;
    isInitialRender?: boolean;
  };
}

const TransitionContext = React.createContext<ParentContextProps>({
  parent: {},
});

function useIsInitialRender() {
  const isInitialRender = useRef(true);
  useEffect(() => {
    isInitialRender.current = false;
  }, []);
  return isInitialRender.current;
}

function CSSTransition({
  show,
  enter = "",
  enterFrom = "",
  enterTo = "",
  leave = "",
  leaveFrom = "",
  leaveTo = "",
  appear,
  children,
}: TransitionProps) {
  const enterClasses = enter.split(" ").filter(s => s.length);
  const enterFromClasses = enterFrom.split(" ").filter(s => s.length);
  const enterToClasses = enterTo.split(" ").filter(s => s.length);
  const leaveClasses = leave.split(" ").filter(s => s.length);
  const leaveFromClasses = leaveFrom.split(" ").filter(s => s.length);
  const leaveToClasses = leaveTo.split(" ").filter(s => s.length);

  function addClasses(node: HTMLElement, classes: Array<string>) {
    // eslint-disable-next-line no-unused-expressions
    classes.length > 0 && node.classList.add(...classes);
  }

  function removeClasses(node: HTMLElement, classes: Array<string>) {
    // eslint-disable-next-line no-unused-expressions
    classes.length && node.classList.remove(...classes);
  }

  return (
    <ReactCSSTransition
      appear={appear}
      unmountOnExit
      in={show}
      addEndListener={(node, done) => {
        node.addEventListener("transitionend", done, false);
      }}
     onEnter={(node: HTMLElement) => {
        addClasses(node, [...enterClasses, ...enterFromClasses]);
      }}
      onEntering={(node: HTMLElement) => {
        removeClasses(node, enterFromClasses);
        addClasses(node, enterToClasses);
      }}
      onEntered={(node: HTMLElement) => {
        removeClasses(node, [...enterToClasses, ...enterClasses]);
      }}
      onExit={(node) => {
        addClasses(node, [...leaveClasses, ...leaveFromClasses]);
      }}
      onExiting={(node) => {
        removeClasses(node, leaveFromClasses);
        addClasses(node, leaveToClasses);
      }}
      onExited={(node) => {
        removeClasses(node, [...leaveToClasses, ...leaveClasses]);
      }}
    >
      {children}
    </ReactCSSTransition>
  );
}

function Transition({ show, appear, ...rest }: TransitionProps) {
  const { parent } = useContext(TransitionContext);
  const isInitialRender = useIsInitialRender();
  const isChild = show === undefined;

  if (isChild) {
    return (
      <CSSTransition
        appear={parent.appear || !parent.isInitialRender}
        show={parent.show}
        {...rest}
      />
    );
  }

  return (
    <TransitionContext.Provider
      value={{
        parent: {
          show,
          isInitialRender,
          appear,
        },
      }}
    >
      <CSSTransition appear={appear} show={show} {...rest} />
    </TransitionContext.Provider>
  );
}

export default Transition;
