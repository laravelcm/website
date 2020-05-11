import React from "react";

interface TextInputProps extends React.InputHTMLAttributes<HTMLInputElement> {
  label?: string;
  name: string;
  errors: string[];
}

const TextInput = ({
  label, name, errors = [], ...rest
}: TextInputProps) => (
  <div>
    {label && (
    <label
      className="block text-sm leading-5 font-medium text-gray-700"
      htmlFor={name}
    >
      {label}
    </label>
    )}
    <div className={`${label ? 'mt-1' : ''} relative`}>
      <input
        className={`form-input sm:text-sm sm:leading-5 transition duration-150 ease-in-out ${errors.length ? `border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red pr-10` : ``}`}
        id={name}
        name={name}
        {...rest}
      />
      {errors.length > 0 && (
        <div className="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
          <svg className="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
            <path
              fillRule="evenodd"
              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
              clipRule="evenodd"
            />
          </svg>
        </div>
      )}
    </div>
    {errors && <p className="text-red-600 text-sm mt-2">{errors[0]}</p>}
  </div>
);

export default TextInput;
