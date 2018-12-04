package br.com.oljsoft.sgr.utils;

import java.io.InputStream;
import java.io.OutputStream;
import java.util.Map;

import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.servlet.http.HttpServletResponse;

import org.hibernate.internal.SessionImpl;
import org.springframework.stereotype.Component;

import net.sf.jasperreports.engine.JRExporter;
import net.sf.jasperreports.engine.JRExporterParameter;
import net.sf.jasperreports.engine.JasperCompileManager;
import net.sf.jasperreports.engine.JasperExportManager;
import net.sf.jasperreports.engine.JasperFillManager;
import net.sf.jasperreports.engine.JasperPrint;
import net.sf.jasperreports.engine.JasperReport;
import net.sf.jasperreports.engine.export.JRPdfExporter;

@Component
public class GeradorDeRelatorios {

	@PersistenceContext
	private EntityManager em;

    public void geraECompilaPdf(String jrxml, 
        Map<String, Object> parametros, OutputStream saida) {

        try {

        	// compila jrxml em memoria
            JasperReport jasper = JasperCompileManager.compileReport(jrxml);

            // preenche relatorio
            JasperPrint print = JasperFillManager.fillReport(jasper, parametros, (((SessionImpl)(this.em.getDelegate())).connection()));

            // exporta para pdf
            JRExporter exporter = new JRPdfExporter();
            exporter.setParameter(JRExporterParameter.JASPER_PRINT, print);
            exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, saida);

            exporter.exportReport();

        } catch (Exception e) {
            throw new RuntimeException("Erro ao gerar relatório", e);
        }
    }   
    
    public void geraCompiladoPdf(InputStream jasperStream, 
            Map<String, Object> parametros, OutputStream saida, HttpServletResponse response) {

            try {
            	
            	// compila jrxml em memoria
                JasperReport jasper = JasperCompileManager.compileReport(jasperStream);

            	// Cria o objeto JaperReport com o Stream do arquivo jasper
        		//JasperReport jasperReport = (JasperReport) JRLoader.loadObject(jasperStream);

        		
        		// Passa para o JasperPrint o relatório, os parâmetros e a fonte dos dados, no caso uma conexão ao banco de dados
        		JasperPrint jasperPrint = JasperFillManager.fillReport(jasper, parametros, (((SessionImpl)(this.em.getDelegate())).connection()));

        		// Configura a respota para o tipo PDF
        		response.setContentType("application/pdf");
        		// Define que o arquivo pode ser visualizado no navegador e também nome final do arquivo
        		// para fazer download do relatório troque 'inline' por 'attachment'
        		response.setHeader("Content-Disposition", "inline;");
        		
        		// Faz a exportação do relatório para o HttpServletResponse
        		final OutputStream outStream = response.getOutputStream();
        		JasperExportManager.exportReportToPdfStream(jasperPrint, outStream);

            } catch (Exception e) {
                throw new RuntimeException("Erro ao gerar relatório", e);
            }
        }   
    
}