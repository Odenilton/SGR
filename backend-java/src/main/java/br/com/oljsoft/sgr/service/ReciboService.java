package br.com.oljsoft.sgr.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.oljsoft.sgr.model.Pessoa;
import br.com.oljsoft.sgr.model.Recibo;
import br.com.oljsoft.sgr.repository.PesquisaRepository;
import br.com.oljsoft.sgr.repository.ReciboRepository;
import br.com.oljsoft.sgr.utils.DateUtils;
import br.com.oljsoft.sgr.utils.Extenso;
import br.com.oljsoft.sgr.utils.Utilitarios;
import br.com.oljsoft.sgr.utils.dto.RelReciboDTO;
import br.com.oljsoft.sgr.utils.enuns.EnumFormaPagamentos;

@Service
public class ReciboService {

	@Autowired
	private ReciboRepository repository;

	@Autowired
	private PesquisaRepository repositoryPesquisa;

	// public Optional<List<Recibo>> listar() {
	//
	// List<Recibo> recibos = this.repository.findAll();
	// Pessoa pessoa = null;
	// List<Recibo> novosRecibos = new ArrayList<Recibo>();
	//
	// for (Recibo rec : recibos) {
	// pessoa = rec.getPessoa();
	// rec.setPessoa(pessoa);
	// novosRecibos.add(rec);
	// System.out.println(rec.getPessoa().getNome());
	// }
	//
	// return Optional.ofNullable(novosRecibos);
	// }

	public Optional<Recibo> salvar(Recibo recibo) {
		return Optional.ofNullable(this.repository.save(recibo));
	}

	public void remover(Long id) {
		this.repository.delete(id);
	}

	public Optional<Recibo> obterPorId(Long id) throws Exception {
		return Optional.ofNullable(this.repository.findOne(id));
	}

	public Optional<List<Recibo>> pesquisar(Recibo recibo) throws Exception {
		return Optional.ofNullable(this.repositoryPesquisa.pesquisarRecibos(recibo));
	}

	public RelReciboDTO obterDadosRelatorioRecibo(Long id) throws Exception {

		RelReciboDTO relReciboDTO = new RelReciboDTO();
		Recibo recibo = this.obterPorId(id).get();

		relReciboDTO.setNomePessoa(recibo.getPessoa().getNome());
		relReciboDTO.setCpfPessoa(recibo.getPessoa().getCpf());
		
		
		relReciboDTO.setRendimentoTributavel(Utilitarios.converteMoeadas(recibo.getRendimentoTributavel()));
		relReciboDTO.setPrevidenciaOficial(Utilitarios.converteMoeadas(recibo.getPrevidenciaOficial()));
		relReciboDTO.setImpostoISS(Utilitarios.converteMoeadas(recibo.getImpostoISS()));
		relReciboDTO.setImpostoIRRF(Utilitarios.converteMoeadas(recibo.getImpostoIRRF()));
		relReciboDTO.setValorLiquido(Utilitarios.converteMoeadas(recibo.getValorLiquido()));
		
		relReciboDTO.setOrgao(recibo.getOrgao().getNome());
		relReciboDTO.setLigacaoOrgao(recibo.getLigacaoOrgao());
		relReciboDTO.setValorExtenso(new Extenso(recibo.getRendimentoTributavel()).toString());
		relReciboDTO.setData(DateUtils.formatarDataPorExtensoSemDia(recibo.getData()));
		relReciboDTO.setDescricaoServico(recibo.getDescricaoServico());
		
		verificaDadosPagamento(recibo.getPessoa(), relReciboDTO);

		return relReciboDTO;
	}

	private void verificaDadosPagamento(Pessoa pessoa, RelReciboDTO relReciboDTO) {
		String stringDadosPagamento = "";
		if (pessoa.getFormaPagamento().equals(EnumFormaPagamentos.CHEQUE)){
			stringDadosPagamento += "CHEQUE";
		}else if (pessoa.getFormaPagamento().equals(EnumFormaPagamentos.TRANSFERENCIA_BANCARIA)){
			stringDadosPagamento += "TRANSFERÊNCIA BANCÁRIA \n \n";
			stringDadosPagamento += "BANCO: " + pessoa.getBanco().getDescricao() + " \n \n";
			stringDadosPagamento += "AGÊNCIA: " + pessoa.getAgencia() + "-" + pessoa.getDigitoAgencia() + " \n \n";
			stringDadosPagamento += pessoa.getTipoConta().getDescricao().toUpperCase() + ": " + pessoa.getConta() + "-" + pessoa.getDigitoConta();
		}
		relReciboDTO.setDadosPagamento(stringDadosPagamento);
	}

}
