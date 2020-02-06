import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import { useTransition, animated } from "react-spring";

import Layout from "@/includes/Auth";
import Seo from "@/includes/Seo";

import TextInput from "@/components/TextInput";
import LoaderButton from "@/components/LoaderButton";

const Login = () => {
  const [isSocial, setIsSocial] = useState(true);
  const [sending, setSending] = useState(false);
  const { errors } = usePage();
  const transitions = useTransition(isSocial, null, {
    from: { opacity: 0, transform: 'translate3d(60px,0,0)' },
    enter: { opacity: 1, transform: 'translate3d(0%,0,0)' },
    leave: { opacity: 0, transform: 'translate3d(20px,0,0)' }
  });
  const [values, setValues] = useState({
    email: 'monneylobe@gmail.com',
    password: 'monneylobe',
    remember: true
  });

  function handleChange(e: React.ChangeEvent<HTMLInputElement>) {
    const key = e.target.name;
    const value = e.target.type === 'checkbox' ? e.target.checked : e.target.value;

    // eslint-disable-next-line no-shadow
    setValues(values => ({
      ...values,
      [key]: value
    }));
  }

  function handleSubmit(e: React.SyntheticEvent) {
    e.preventDefault();
    setSending(true);
    Inertia.post('/login', values).then(() => {
      setSending(false);
    });
  }

  return (
    <>
      <Seo title="Connexion" />
      <div className="flex justify-between">
        <span />
        <p className="text-sm text-gray-600">Pas encore membre ? <InertiaLink href="/register" className="link">Créer votre compte</InertiaLink></p>
      </div>
      <div className="w-full md:w-3/4 lg:w-96 mb-16 mt-24 mx-auto relative h-120">
        <h1 className="text-2xl font-medium text-gray-700 mb-6">Se connecter sur Laravel Cameroun</h1>
        {
          transitions.map(({ item, key,  props }) =>
            item
              ? (
                <animated.div key={key} style={props}>
                  <div style={{ position: "absolute", left: 0, right: 0 }}>
                    <div className="flex flex-col">
                      <a href="/login/github" className="flex bg-brand-github text-base text-white justify-center px-10 py-3 rounded-md hover:bg-gray-900 mb-3">
                        <svg className="h-5 w-5 text-white mr-3" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10.001 0C4.475-.002 0 4.593 0 10.264c0 4.485 2.8 8.297 6.699 9.697.525.135.444-.248.444-.51v-1.778c-3.032.365-3.155-1.696-3.358-2.04-.411-.721-1.383-.905-1.093-1.25.69-.364 1.395.093 2.21 1.33.59.897 1.74.746 2.324.596.127-.539.4-1.021.775-1.395-3.141-.578-4.45-2.548-4.45-4.889 0-1.136.364-2.18 1.079-3.022-.456-1.389.042-2.578.11-2.755 1.297-.119 2.647.955 2.752 1.04.737-.204 1.58-.312 2.522-.312.948 0 1.793.112 2.537.319.252-.197 1.503-1.12 2.71-1.008.065.177.552 1.338.123 2.709.724.844 1.092 1.898 1.092 3.036 0 2.346-1.318 4.317-4.468 4.886.27.273.484.598.63.957.146.358.221.743.22 1.132v2.582c.019.207 0 .411.336.411C17.151 18.63 20 14.79 20 10.266 20 4.593 15.522 0 10.001 0z" fill="currentColor" />
                        </svg>
                        Continuer avec Github
                      </a>
                      <a href="/login/google" className="flex bg-white shadow-md text-base text-gray-800 justify-center px-10 py-3 rounded-md hover:bg-gray-100">
                        <svg className="h-5 w-5 text-white mr-3" xmlns="http://www.w3.org/2000/svg">
                          <path d="M19.99 10.187c0-.82-.069-1.417-.216-2.037H10.2v3.698h5.62c-.113.919-.725 2.303-2.084 3.233l-.02.124 3.028 2.292.21.02c1.926-1.738 3.037-4.296 3.037-7.33z" fill="#4285F4" />
                          <path d="M10.2 19.931c2.753 0 5.064-.886 6.753-2.414l-3.218-2.436c-.862.587-2.017.997-3.536.997a6.126 6.126 0 01-5.801-4.141l-.12.01-3.148 2.38-.041.112c1.677 3.256 5.122 5.492 9.11 5.492z" fill="#34A853" />
                          <path d="M4.397 11.937a6.009 6.009 0 01-.34-1.971c0-.687.125-1.351.33-1.971l-.007-.132-3.187-2.42-.104.05A9.79 9.79 0 000 9.965a9.79 9.79 0 001.088 4.473l3.308-2.502z" fill="#FBBC05" />
                          <path d="M10.2 3.853c1.914 0 3.206.809 3.943 1.484l2.878-2.746C15.253.985 12.953 0 10.199 0 6.211 0 2.766 2.237 1.09 5.492l3.297 2.503A6.152 6.152 0 0110.2 3.853z" fill="#EB4335" />
                        </svg>
                        Continuer avec Google
                      </a>
                    </div>
                    <p className="mt-8 text-sm">
                      Si vous n'avez pas lié ces comptes, vous pouvez toujours vous connecter avec votre <span className="link cursor-pointer" onClick={() => setIsSocial(false)}>addresse email.</span>
                    </p>
                  </div>
                </animated.div>
              )
              : (
                <animated.div key={key} style={props}>
                  <div style={{ position: "absolute", left: 0, right: 0 }}>
                    <div className="p-8 bg-white shadow-smooth rounded-md">
                      <form onSubmit={handleSubmit}>
                        <TextInput
                          label="Adresse Email"
                          name="email"
                          type="email"
                          errors={errors.email}
                          placeholder="john.doe@gmail.com"
                          value={values.email}
                          onChange={handleChange}
                        />
                        <TextInput
                          label="Mot de passe"
                          name="password"
                          type="password"
                          errors={errors.password}
                          placeholder="*********"
                          value={values.password}
                          onChange={handleChange}
                        />
                        <div className="mt-6 flex flex-col-reverse lg:flex-row justify-between lg:items-center">
                          <LoaderButton title="Connexion" loading={sending} type="submit" />
                          <InertiaLink href="/password/reset" className="link mb-2 lg:mb-0 text-sm">Mot de passe oublié?</InertiaLink>
                        </div>
                      </form>
                    </div>
                    <p className="mt-8 text-sm text-center">
                      Vous pouvez aussi utiliser <span className="link cursor-pointer" onClick={() => setIsSocial(true)}>Github ou Google</span>
                    </p>
                  </div>
                </animated.div>
              )
          )
        }
      </div>
    </>
  );
};

Login.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Login;
