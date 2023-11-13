function calculer_moyenne()
{
var tab_simulateur_notes = document.getElementById('tab-simulateur-notes');
var nb_lignes = tab_simulateur_notes.rows.length;
var coeff_total = 0;
var points_total = 0;
var tab_notes = [];
                        
for(var i=0; i < nb_lignes; i++)
{
if(!(tab_simulateur_notes.rows[i].cells[0].nodeName == "TH"))
{
var note = tab_simulateur_notes.rows[i].cells[2].firstChild.value;
var coeff = tab_simulateur_notes.rows[i].cells[1].innerHTML;
                                
                                                if(coeff == "1.66")
                                    { coeff = 5/3; }
                                
                                if(coeff == "2.5")
                                    { coeff = 5/2; }
                                
                                if(coeff == "3.33")
                                    { coeff = 10/3; }
                
                                if((note != "") && (coeff != "-"))						{
                                    if((note<0) || (note>20))
                                    {
                                        tab_simulateur_notes.rows[i].cells[2].firstChild.value = "";
                                        tab_simulateur_notes.rows[i].cells[3].innerHTML = "-";
                                        tab_notes.push("v");
                                    }
                                    else
                                    {
                                        tab_simulateur_notes.rows[i].cells[2].firstChild.value = Math.round(note*10)/10;
                                        note = Math.round(note*10)/10;
                                        tab_notes.push(note);
                
                                        coeff = parseFloat(coeff);
                                        coeff_total = coeff_total + coeff;
                
                                        var points = Math.round(coeff * note);
                                        points_total = points_total + points;
                                        
                                        if(Number.isInteger(points))
                                            { tab_simulateur_notes.rows[i].cells[3].innerHTML = points; }
                                        else
                                            { tab_simulateur_notes.rows[i].cells[3].innerHTML = points.toFixed(1); }
                                    }
                                }
                                else
                                {
                                    tab_simulateur_notes.rows[i].cells[2].firstChild.value = "";
                                    tab_simulateur_notes.rows[i].cells[3].innerHTML = "-";
                                    tab_notes.push("v");
                                }
                            }
                        }
                        
                        if(coeff_total != 0)						{
                            var p_resultat = document.getElementById('resultat-simulateur');
                            var moyenne = points_total/coeff_total;
                            var points_necessaire = (20 * coeff_total) / 2;
                            var points_en_avance = Math.round(points_total - points_necessaire);
                            var points_a_rattraper = Math.round(points_necessaire - points_total);
                            
                            if(moyenne<8)
                            {
                                var commentaire = "Vous n'obtenez pas le diplôme du bac, et vous n'avez pas la possibilité d'aller au rattrapage.<br />Vous auriez eu <strong>" + points_a_rattraper + " points à rattraper</strong>.";
                            }
                            else if(moyenne>=8 && moyenne<10)
                            {
                                var commentaire = "Vous n'obtenez pas le diplôme du bac mais tout n'est pas perdu, vous pouvez aller au rattrapage !<br />Vous avez <strong>" + points_a_rattraper + " points à rattraper</strong>.";
                            }
                            else if(moyenne>=10 && moyenne<12)
                            {
                                var commentaire = "Vous êtes admis !<br />Vous décrochez le diplôme du bac <strong>sans mention</strong>, mais avec <strong>" + points_en_avance + " points d'avance</strong>.";
                            }
                            else if(moyenne>=12 && moyenne<14)
                            {
                                var commentaire = "Vous êtes admis !<br />Vous décrochez le diplôme du bac avec la <strong>mention Assez-Bien</strong> et avec <strong>" + points_en_avance + " points d'avance</strong>."
                            }
                            else if(moyenne>=14 && moyenne<16)
                            {
                                var commentaire = "Vous êtes admis !<br />Vous décrochez le diplôme du bac avec la <strong>mention Bien</strong> et avec <strong>" + points_en_avance + " points d'avance</strong>.";
                            }
                            else if(moyenne>=16 && moyenne<18)
                            {
                                var commentaire = "Vous êtes admis !<br />Vous décrochez le diplôme du bac avec la <strong>mention Très-Bien</strong> et avec <strong>" + points_en_avance + " points d'avance</strong>.";
                            }
                            else
                            {
                                var commentaire = "Vous êtes admis !<br />Vous décrochez le diplôme du bac avec les rarissimes <strong>Félicitations du Jury</strong> et avec <strong>" + points_en_avance + " points d'avance</strong>.";
                            }
                            
                            p_resultat.innerHTML = "Vous cumulez un total de <strong>" + Math.round(points_total) + " points</strong>. <br />Votre moyenne est de <strong>" + moyenne.toFixed(2) + "/20</strong>.<br />" + commentaire;
                            document.getElementById('partage-simulation-1').style.display = "block";
                            document.getElementById('partage-simulation-2').style.display = "block";
                            
                            
                                var choix_annee = document.getElementById('choix_annee').value;
                                var choix_option = document.getElementById('choix_option').value;
                                var choix_lca = document.getElementById('choix_lca').value;
                                var choix_specialite_abandonnee = document.getElementById('choix_specialite_abandonnee').value;
                                var choix_specialite_1 = document.getElementById('choix_specialite_1').value;
                                var choix_specialite_2 = document.getElementById('choix_specialite_2').value;
                                
                                localStorage.setItem('simul-gene-param',choix_annee+','+choix_option+','+choix_lca+','+choix_specialite_abandonnee+','+choix_specialite_1+','+choix_specialite_2);
                                localStorage.setItem('simul-gene-notes',tab_notes);
                                            
                            ga('send', 'event', 'Simulateur notes', 'Calcul de moyenne', 'Général', 1, {'nonInteraction': 1});
                        }
                        else
                        {
                            document.getElementById('resultat-simulateur').innerHTML = "";
                            //document.getElementById('partage-simulation-1').style.display = "none";
                            //document.getElementById('partage-simulation-2').style.display = "none";
                        }
}
                    
function vider_formulaire()
{
var tab_simulateur_notes = document.getElementById('tab-simulateur-notes');
var nb_lignes = tab_simulateur_notes.rows.length;
                        
for(var i=0; i < nb_lignes; i++)
{
if(!(tab_simulateur_notes.rows[i].cells[0].nodeName == "TH"))
{
tab_simulateur_notes.rows[i].cells[2].firstChild.value = "";
tab_simulateur_notes.rows[i].cells[3].innerHTML = "";
document.getElementById('resultat-simulateur').innerHTML = "";
}
}
                        
                        
document.getElementById('choix_annee').value = 'juin_2022';
document.getElementById('choix_option').value = 'non';
document.getElementById('choix_lca').value = 'non';
document.getElementById('choix_specialite_abandonnee').value = 'specialite_abandonnee';
document.getElementById('choix_specialite_1').value = 'specialite_1';
document.getElementById('choix_specialite_2').value = 'specialite_2';
check_choix_annee();
check_choix_option();
check_choix_lca();
localStorage.removeItem('simul-gene-param');
localStorage.removeItem('simul-gene-notes');
}
</script>
                

function check_choix_annee()
{
var choix_annee = document.getElementById('choix_annee').value;
var choix_option = document.getElementById('choix_option').value;
var choix_lca = document.getElementById('choix_lca').value;
                
if(choix_annee == "juin_2023")
{
document.getElementById('coeff_specialite_abandonnee').innerHTML = "8";
document.getElementById('coeff_histoire_geographie_1').innerHTML = "3";
document.getElementById('coeff_langue_vivante_a_1').innerHTML = "3";
document.getElementById('coeff_langue_vivante_b_1').innerHTML = "3";
document.getElementById('coeff_enseignement_scientifique_1').innerHTML = "3";
document.getElementById('coeff_moyenne_ou_moral').innerHTML = "1";
document.getElementById('coeff_enseignement_scientifique_2').innerHTML = "3";
document.getElementById('coeff_eps_ccf').innerHTML = "6";
                                
document.getElementById('titre_moyenne_ou_moral').innerHTML = "Enseignement moral et civique";
                              
var ligne_epreuve_anticipe = document.getElementById('ligne_epreuve_anticipe');
var ligne_epreuve_terminale = document.getElementById('ligne_epreuve_terminale');
                                
if(choix_option == "oui")
{
var ligne_option_1_1 = document.getElementById('ligne_option_1_1');
if(ligne_option_1_1 == null)
{
var ligne_option_1_1 = document.createElement('tr');
ligne_option_1_1.id = "ligne_option_1_1";
ligne_option_1_1.innerHTML = "<td>Option 1 <span class=\"nature_epreuve\">(facultatif)</span></td><td class=\"coeff\">2</td><td><input class=\"note_visee\" type=\"number\" name=\"option_1_1\" min=\"0\" max=\"20\" step=\"0.1\"></td><td class=\"points\">-</td>";
                                        
var ligne_lca_latin_1 = document.getElementById('ligne_lca_latin_1');
if(ligne_lca_latin_1 == null)
{ ligne_epreuve_anticipe.parentNode.insertBefore(ligne_option_1_1,ligne_epreuve_anticipe); }
else
{ ligne_lca_latin_1.parentNode.insertBefore(ligne_option_1_1,ligne_lca_latin_1); }
}
}
                                
if(choix_lca == "oui")
{
var ligne_lca_latin_1 = document.getElementById('ligne_lca_latin_1');
if(ligne_lca_latin_1 == null)
                                    {	
var ligne_lca_latin_1 = document.createElement('tr');
 ligne_lca_latin_1.id = "ligne_lca_latin_1";
ligne_lca_latin_1.innerHTML = "<td>LCA Latin <span class=\"nature_epreuve\">(facultatif)</span></td><td class=\"coeff\">2</td><td><input class=\"note_visee\" type=\"number\" name=\"lca_latin_1\" min=\"0\" max=\"20\" step=\"0.1\"></td><td class=\"points\">-</td>";
ligne_epreuve_anticipe.parentNode.insertBefore(ligne_lca_latin_1,ligne_epreuve_anticipe);                                       
}
                                
var ligne_lca_grec_1 = document.getElementById('ligne_lca_grec_1');
if(ligne_lca_grec_1 == null)
{	
var ligne_lca_grec_1 = document.createElement('tr');
ligne_lca_grec_1.id = "ligne_lca_grec_1";
ligne_lca_grec_1.innerHTML = "<td>LCA Grec <span class=\"nature_epreuve\">(facultatif)</span></td><td class=\"coeff\">2</td><td><input class=\"note_visee\" type=\"number\" name=\"lca_grec_1\" min=\"0\" max=\"20\" step=\"0.1\"></td><td class=\"points\">-</td>";
ligne_epreuve_anticipe.parentNode.insertBefore(ligne_lca_grec_1,ligne_epreuve_anticipe);
}
}
}				
else				{
document.getElementById('coeff_specialite_abandonnee').innerHTML = "5";
document.getElementById('coeff_histoire_geographie_1').innerHTML = "3.33";
document.getElementById('coeff_langue_vivante_a_1').innerHTML = "3.33";
document.getElementById('coeff_langue_vivante_b_1').innerHTML = "3.33";
document.getElementById('coeff_enseignement_scientifique_1').innerHTML = "2.5";
document.getElementById('coeff_moyenne_ou_moral').innerHTML = "5";
document.getElementById('coeff_enseignement_scientifique_2').innerHTML = "2.5";
document.getElementById('coeff_eps_ccf').innerHTML = "5";
                                
document.getElementById('titre_moyenne_ou_moral').innerHTML = "Moyenne générale <span class=\"nature_epreuve\">(bulletins)</span>";
                                
var ligne_option_1_1 = document.getElementById('ligne_option_1_1');
if(ligne_option_1_1 !== null)
{
ligne_option_1_1.parentNode.removeChild(ligne_option_1_1);
}
                                
var ligne_lca_latin_1 = document.getElementById('ligne_lca_latin_1');
if(ligne_lca_latin_1 !== null)
{
ligne_lca_latin_1.parentNode.removeChild(ligne_lca_latin_1);
}
                                
var ligne_lca_grec_1 = document.getElementById('ligne_lca_grec_1')
if(ligne_lca_grec_1 !== null)
{
ligne_lca_grec_1.parentNode.removeChild(ligne_lca_grec_1);
                              
}
}
                    
