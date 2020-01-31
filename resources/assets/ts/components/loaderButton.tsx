import React from "react";

interface LoaderButtonProps extends React.ButtonHTMLAttributes<HTMLButtonElement> {
  title: string;
  loading: boolean;
}

export default ({ title, loading, ...rest }: LoaderButtonProps) => {
  return (
    <button
      disabled={loading}
      className="btn btn-primary flex items-center justify-center"
      {...rest}
    >
      {loading && <span className="btn-spinner mr-3" />}
      <span>{title}</span>
    </button>
  );
}
