import React from "react";

interface LoaderButtonProps
  extends React.ButtonHTMLAttributes<HTMLButtonElement> {
  title: string;
  loading: boolean;
  className?: string;
}

export default ({
  title, loading, className, ...rest
}: LoaderButtonProps) => (
  <button
    disabled={loading}
    className={`btn btn-primary w-full flex items-center justify-center ${className}`}
    {...rest}
  >
    {loading && <span className="btn-spinner mr-3" />}
    <span>{title}</span>
  </button>
);
