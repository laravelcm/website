import React from "react";

interface SelectInputProps extends React.SelectHTMLAttributes<HTMLSelectElement> {
  label?: string;
  name: string;
  errors: string[];
  containerClass?: string;
  children: React.ReactNode;
}

export default ({
  label, name, containerClass, errors = [], children, ...rest
}: SelectInputProps) => (
  <div className={containerClass}>
    {label && (
      <label className="form-label" htmlFor={name}>
        {label}:
      </label>
    )}
    <select
      id={name}
      name={name}
      className={`form-select block w-full ${errors.length ? 'border-red-500' : ''}`}
      {...rest}
    >
      {children}
    </select>
    {errors && <p className="text-red-500 text-xs mt-2">{errors[0]}</p>}
  </div>
);
