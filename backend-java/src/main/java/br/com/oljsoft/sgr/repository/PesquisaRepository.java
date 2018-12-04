package br.com.oljsoft.sgr.repository;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.NoResultException;
import javax.persistence.PersistenceContext;
import javax.persistence.Query;

import org.springframework.stereotype.Component;

import br.com.oljsoft.sgr.model.Pessoa;
import br.com.oljsoft.sgr.model.Recibo;
import br.com.oljsoft.sgr.model.Orgao;
import br.com.oljsoft.sgr.model.Parametro;

@Component
public class PesquisaRepository {

	@PersistenceContext
	private EntityManager em;

	@SuppressWarnings("unchecked")
	public List<Parametro> pesquisarParametros(Parametro parametro) throws Exception {
		try {
			StringBuilder hql = new StringBuilder();
			hql.append("select p from Parametro p " + "left outer join p.orgao where 1=1 ");

			if (parametro.getMes() != null && !parametro.getMes().isEmpty()) {
				hql.append(" and p.mes = " + parametro.getMes());
			}

			if (parametro.getAno() != null && !parametro.getAno().isEmpty()) {
				hql.append(" and p.ano = " + parametro.getAno());
			}

			if (parametro.getOrgao().getId() != null) {
				hql.append(" and p.orgao.id = " + parametro.getOrgao().getId());
			}

			hql.append(" order by p.id asc ");
			Query q = em.createQuery(hql.toString()).setMaxResults(200);
			return q.getResultList();
		} catch (NoResultException e) {
			e.printStackTrace();
			return null;
		} catch (IllegalArgumentException e) {
			e.printStackTrace();
			return null;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}

	@SuppressWarnings("unchecked")
	public List<Pessoa> pesquisarPessoas(Pessoa pessoa) throws Exception {
		try {
			StringBuilder hql = new StringBuilder();
			hql.append("select p from Pessoa p where 1=1");

			if (pessoa.getId() != null) {
				hql.append(" and p.id = " + pessoa.getId());
			}

			if (pessoa.getNome() != null && !pessoa.getNome().isEmpty()) {
				hql.append(" and p.nome like '%" + pessoa.getNome() + "%'");
			}

			if (pessoa.getCpf() != null && !pessoa.getCpf().isEmpty()) {
				hql.append(" and p.cpf = '" + pessoa.getCpf() + "'");
			}

			hql.append(" order by p.id asc ");
			Query q = em.createQuery(hql.toString()).setMaxResults(200);
			return q.getResultList();
		} catch (NoResultException e) {
			e.printStackTrace();
			return null;
		} catch (IllegalArgumentException e) {
			e.printStackTrace();
			return null;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}

	@SuppressWarnings("unchecked")
	public List<Orgao> pesquisarOrgaos(Orgao orgao) {
		try {
			StringBuilder hql = new StringBuilder();
			hql.append("select o from Orgao o where 1=1");

			if (orgao.getId() != null) {
				hql.append(" and o.id = " + orgao.getId());
			}

			if (orgao.getNome() != null && !orgao.getNome().isEmpty()) {
				hql.append(" and o.nome like '%" + orgao.getNome() + "%'");
			}

			hql.append(" order by o.id asc ");
			Query q = em.createQuery(hql.toString()).setMaxResults(200);
			return q.getResultList();
		} catch (NoResultException e) {
			e.printStackTrace();
			return null;
		} catch (IllegalArgumentException e) {
			e.printStackTrace();
			return null;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}

	@SuppressWarnings("unchecked")
	public List<Recibo> pesquisarRecibos(Recibo recibo) {
		try {
			StringBuilder hql = new StringBuilder();
			hql.append("SELECT r FROM Recibo r " + " where 1=1 ");

			if (recibo.getId() != null) {
				hql.append(" and r.id = " + recibo.getId());
			}

			if (recibo.getMes() != null) {
				hql.append(" and r.mes = " + recibo.getMes());
			}

			if (recibo.getAno() != null) {
				hql.append(" and r.ano = " + recibo.getAno());
			}

			if (recibo.getOrgao().getId() != null) {
				hql.append(" and r.orgao.id = " + recibo.getOrgao().getId());
			}

			hql.append(" order by r.id asc ");
			Query q = em.createQuery(hql.toString()).setMaxResults(200);
			return q.getResultList();
		} catch (NoResultException e) {
			e.printStackTrace();
			return null;
		} catch (IllegalArgumentException e) {
			e.printStackTrace();
			return null;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}

}
