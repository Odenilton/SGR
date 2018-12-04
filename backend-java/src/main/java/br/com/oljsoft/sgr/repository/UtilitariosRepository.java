package br.com.oljsoft.sgr.repository;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import br.com.oljsoft.sgr.model.Orgao;
import br.com.oljsoft.sgr.utils.Utilitarios;
import br.com.oljsoft.sgr.utils.dto.BancoDTO;
import br.com.oljsoft.sgr.utils.dto.EstadoDTO;
import br.com.oljsoft.sgr.utils.dto.ObjetoEnumDTO;
import br.com.oljsoft.sgr.utils.enuns.EnumAnos;
import br.com.oljsoft.sgr.utils.enuns.EnumBancos;
import br.com.oljsoft.sgr.utils.enuns.EnumMeses;
import br.com.oljsoft.sgr.utils.enuns.EnumUf;

@Component
public class UtilitariosRepository {

	// @PersistenceContext
	// private EntityManager em;

	@Autowired
	private OrgaoRepository orgaoRepository;

	public List<EstadoDTO> obterEstados() {
		return Utilitarios.getSelectItemEnumEestado(EnumUf.values());
	}

	public List<ObjetoEnumDTO> obterMeses() {
		return Utilitarios.getSelectItemEnum(EnumMeses.values());
	}

	public List<ObjetoEnumDTO> obterAnos() {
		return Utilitarios.getSelectItemEnum(EnumAnos.values());
	}

	public List<Orgao> obterOrgaos() {
		return orgaoRepository.findAll();
	}

	public List<BancoDTO> obterBancos() {
		return Utilitarios.getSelectItemEnumBanco(EnumBancos.values());
	}

}
