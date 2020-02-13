import React from "react";

interface TextInputProps extends React.InputHTMLAttributes<HTMLInputElement> {
  label?: string;
  name: string;
  errors: string[];
}

const TextInput = ({
  label, name, errors = [], ...rest
}: TextInputProps) => (
  <div className="w-full mb-3">
    {label && (
    <label
      className="block tracking-wide text-gray-800 text-sm mb-2"
      htmlFor={name}
    >
      {label}
    </label>
    )}
    <input
      className={`input-form ${errors.length ? `border-red-500` : ``}`}
      id={name}
      name={name}
      {...rest}
    />
    {errors && <p className="text-red-500 text-xs mt-2">{errors[0]}</p>}
  </div>
);

export default TextInput;
