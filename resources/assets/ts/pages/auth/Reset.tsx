import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";

import Layout from "@/includes/Auth";
import Seo from "@/includes/Seo";
import FlashMessages from "@/includes/FlashMessages";

import TextInput from "@/components/TextInput";
import LoaderButton from "@/components/LoaderButton";

const Reset = () => {
  const [sending, setSending] = useState(false);
  const { errors, token, email } = usePage();
  const [values, setValues] = useState({
    email,
    token,
    password: "",
    password_confirmation: "",
  });

  function handleChange(e: React.ChangeEvent<HTMLInputElement>) {
    const key = e.target.name;
    const value = e.target.type === "checkbox" ? e.target.checked : e.target.value;

    // eslint-disable-next-line no-shadow
    setValues((values) => ({
      ...values,
      [key]: value,
    }));
  }

  function handleSubmit(e: React.SyntheticEvent) {
    e.preventDefault();
    setSending(true);
    Inertia.post("/password/reset", values).then(() => {
      setSending(false);
    });
  }

  return (
    <>
      <Seo title="Réinitialisation du mot de passe" />
      <div className="flex justify-between items-center">
        <span />
        <p className="text-sm text-gray-600">
          Pas encore membre ?{" "}
          <InertiaLink href="/register" className="link">
            Créer votre compte
          </InertiaLink>
        </p>
      </div>
      <div className="w-full md:w-3/4 lg:w-125 mb-16 mt-12 mx-auto">
        <FlashMessages />
        <h1 className="text-2xl font-medium text-gray-700 mb-4">
          Réinitialisation du mot de passe
        </h1>
        <div className="p-8 bg-white shadow-smooth rounded-md">
          <form onSubmit={handleSubmit}>
            <input type="hidden" name="token" value={values.token} />
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
            <TextInput
              label="Mot de passe"
              name="password_confirmation"
              type="password"
              errors={errors.password_confirmation}
              placeholder="*********"
              value={values.password_confirmation}
              onChange={handleChange}
            />
            <LoaderButton
              title="Réinitialiser mon mot de passe"
              className="mt-6"
              loading={sending}
              type="submit"
            />
          </form>
        </div>
      </div>
    </>
  );
};

Reset.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Reset;
